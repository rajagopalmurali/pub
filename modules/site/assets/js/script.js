// Rotating text functionality for hero heading
function initRotatingText() {
    const rotatingTextElement = document.querySelector('.rotating-text');
    if (!rotatingTextElement) return;

    const texts = rotatingTextElement.getAttribute('data-texts').split(',');
    let currentIndex = 0;

    function rotateText() {
        // Fade out
        rotatingTextElement.style.opacity = '0';
        rotatingTextElement.style.transform = 'translateY(10px)';
        
        setTimeout(() => {
            // Change text
            currentIndex = (currentIndex + 1) % texts.length;
            rotatingTextElement.textContent = texts[currentIndex];
            
            // Fade in
            rotatingTextElement.style.opacity = '1';
            rotatingTextElement.style.transform = 'translateY(0)';
        }, 300);
    }

    // Set initial styles
    rotatingTextElement.style.transition = 'all 0.2s ease-in-out';
    rotatingTextElement.style.display = 'inline-block';
    
    // Start rotation every 3 seconds
    setInterval(rotateText, 2000);
}

// Initialize rotating text when DOM is ready
$(document).ready(function() {
    initRotatingText();
});

function playTerminalAnimation(containerId) {
    const $container = $("#" + containerId);
    const $lines = $container.find("span");
    $lines.hide();

    function revealLines(i = 0) {
        if (i >= $lines.length) return;
        $lines.eq(i).fadeIn(300, function () {
            setTimeout(() => revealLines(i + 1), 600);
        });
    }

    revealLines();
}

function toggleFilterMenu(key) {
    $('.filter-menu').not('#menu-' + key).addClass('hidden');
    $('#menu-' + key).toggleClass('hidden');

    setTimeout(() => {
        $(document).on('click.outsideFilter', function (e) {
            if (
                !$(e.target).closest('#menu-' + key).length &&
                !$(e.target).closest('button[onclick*="' + key + '"]').length
            ) {
                $('#menu-' + key).addClass('hidden');
                $(document).off('click.outsideFilter');
            }
        });
    }, 50);
}

function onTagChange(type, slug, isChecked) {
    const url = new URL(window.location.href);
    const params = url.searchParams;

    let values = [];
    if (params.has(type)) {
        values = params.get(type).split(',').filter(Boolean);
    }

    if (isChecked) {
        if (!values.includes(slug)) {
            values.push(slug);
        }
    } else {
        values = values.filter(v => v !== slug);
    }

    if (values.length > 0) {
        params.set(type, values.join(','));
    } else {
        params.delete(type);
    }

    redirectWithParams(params);
}

function removeTagParam(type, slug) {
    const url = new URL(window.location.href);
    const params = url.searchParams;

    let values = [];
    if (params.has(type)) {
        values = params.get(type).split(',').filter(Boolean);
    }

    values = values.filter(v => v !== slug);

    if (values.length > 0) {
        params.set(type, values.join(','));
    } else {
        params.delete(type);
    }

    redirectWithParams(params);
}

function clearAllTags() {
    const url = new URL(window.location.href);
    url.search = '';
    window.location.href = url.toString();
}

function redirectWithParams(params) {
    const newUrl = window.location.pathname + '?' + params.toString();
    window.location.href = newUrl;
}

function showCommonModal() {
    $('#common-modal')
        .removeClass('hidden')
        .css('display', 'none')
        .fadeIn(200);
}
function hideCommonModal() {
    const $modal = $('#common-modal');
    const $content = $('#common-modal-content');
    $modal.fadeOut(150, function () {
        $modal.addClass('hidden');
        if ($content.hasClass('max-w-3xl')) {
            $content.removeClass('max-w-3xl').addClass('max-w-md');
        }
    });
}


function initPreview({
    inputId = null,
    layoutId = null,
    previewId,
    data = {}
}) {
    if (!previewId) return;

    const inputElement = inputId ? document.getElementById(inputId) : null;
    const layoutElement = layoutId ? document.getElementById(layoutId) : null;
    const iframe = document.getElementById(previewId);
    if (!iframe) return;

    const renderPreview = () => {
        const htmlContent = inputElement?.value ?? '';
        let layout = layoutElement?.value ?? '';
        let finalHtml = '';

        const hasHtmlTags = /<html[\s\S]*?>[\s\S]*?<\/html>/.test(layout);

        if (layout && !hasHtmlTags) {
            layout = `
          <!DOCTYPE html>
          <html>
            <head>
              <meta charset="UTF-8">
              <title>Preview</title>
            </head>
            <body>
              ${layout}
            </body>
          </html>
        `;
        }

        if (layout && htmlContent) {
            finalHtml = layout.includes("@yield('content')")
                ? layout.replace("@yield('content')", htmlContent)
                : layout;
        } else if (layout) {
            finalHtml = layout;
        } else {
            finalHtml = htmlContent;
        }

        finalHtml = finalHtml.replace(/{{\s*(\w+)\s*}}/g, (_, key) => {
            return Object.prototype.hasOwnProperty.call(data, key) ? data[key] : `{{ ${key} }}`;
        });

        const doc = iframe.contentDocument || iframe.contentWindow.document;
        doc.open();
        doc.write(finalHtml);
        doc.close();
    };

    renderPreview();
}

function loadTemplatePreview(templateId) {
    if (!templateId) {
        setFlashMessage('Template ID is required.', 'info');
        return;
    }
    $.ajax({
        url: `/email-templates/load-preview`,
        method: "GET",
        data: { template_id: templateId },
        success: function (resp) {
            resp = $.parseJSON(resp);
            if (resp.success) {
                $('#common-modal .common-modal-body').empty();
                $('#common-modal .common-modal-body').html(resp.html);
                $('#common-modal-content').removeClass('max-w-md');
                $('#common-modal-content').addClass('max-w-4xl');
                $('#common-modal-title').text(resp.title);
                showCommonModal();
                initPreview({
                    inputId: 'htmlInput',
                    previewId: 'template-preview-iframe',
                    layoutId: 'template-layout',
                    data: resp.data_mapping
                });
                setPreviewMode('desktop');
            } else {
                setFlashMessage(resp.message || 'Failed to load connector details.', 'danger');
            }
        },
        error: function () {
            $('#updateEmailTemplate').find('.update-template-body').html('<div class="text-danger">Error loading template</div>');
        },
    });
}

let isManualResize = false;

const previewContainer = document.getElementById('template-preview-container');
if (previewContainer) {
    previewContainer.addEventListener('mousedown', () => {
        isManualResize = true;
    });
}


function setPreviewMode(mode) {
    if (isManualResize) return; // Skip if user manually resized

    const wrapper = document.getElementById('template-preview-container');
    if (!wrapper) return;

    if (mode === 'mobile') {
        wrapper.style.width = '375px';
    } else if (mode === 'tablet') {
        wrapper.style.width = '768px';
    } else {
        wrapper.style.width = '1024px';
    }

    updateModeLabel();
}

function updateModeLabel() {
    const container = document.getElementById('template-preview-container');
    const label = document.getElementById('preview-width-label');
    const width = container.offsetWidth;

    // Update label
    label.textContent = `${width}px`;

    // Determine current mode based on width
    let currentMode = 'desktop';
    if (width <= 480) currentMode = 'mobile';
    else if (width <= 850) currentMode = 'tablet';

    // Update button highlight
    const buttons = document.querySelectorAll('.preview-toggle-btn');
    buttons.forEach(btn => {
        const isActive = btn.dataset.mode === currentMode;
        btn.classList.toggle('bg-gray-900', isActive);
        btn.classList.toggle('text-white', isActive);
        btn.classList.toggle('bg-white', !isActive);
        btn.classList.toggle('text-gray-700', !isActive);
    });
}

function resetPreviewMode() {
    isManualResize = false;
    setPreviewMode('tablet');
}
