<div
class="overflow-auto h-full bg-gray-50 dark:bg-gray-900 text-sm text-gray-800 dark:text-gray-100 border-gray-200 dark:border-gray-700">
<!-- Preview Controls -->
<div class="flex items-center justify-end gap-1 p-2 bg-gray-100 border border-b-0 text-xs">
  <button type="button" onclick="setPreviewMode('desktop')"
    class="preview-toggle-btn px-2 py-1 rounded border text-gray-700 bg-white hover:bg-gray-900 hover:text-white"
    data-mode="desktop">Desktop</button>
  <button type="button" onclick="setPreviewMode('tablet')"
    class="preview-toggle-btn px-2 py-1 rounded border text-gray-700 bg-white hover:bg-gray-900 hover:text-white" data-mode="tablet">Tablet</button>
  <button type="button" onclick="setPreviewMode('mobile')"
    class="preview-toggle-btn px-2 py-1 rounded border text-gray-700 bg-white hover:bg-gray-900 hover:text-white" data-mode="mobile">Mobile</button>
    <button type="button" onclick="resetPreviewMode()"
    class="preview-toggle-btn px-2 py-1 rounded border text-gray-700 bg-white hover:bg-gray-900 hover:text-white">
    Reset
</button>

</div>
  <textarea id="template-layout" hidden><?= $template->layout->body ?></textarea>
  <input type="hidden" name="body" id="htmlInput" value="<?= htmlspecialchars($template->body) ?>" />
  <!-- Preview Container -->
  <div class="w-full flex justify-center bg-gray-50 py-6">
    <div id="template-preview-wrapper" class="relative flex flex-col items-center">
      <div id="template-preview-container"
        class="border rounded overflow-hidden bg-white transition-all duration-300 resize-x"
        style="min-width: 320px; max-width: 100%; width: 768px;">

        <div class="w-full">
          <iframe id="template-preview-iframe" class="w-full h-[60vh] block" style="min-height: 520px;"></iframe>
        </div>
      </div>

      <div class="text-xs text-gray-400 mt-2" id="preview-width-label">768px</div>
    </div>
  </div>

</div>

<script>
  let resizeObserver = new ResizeObserver(() => updateModeLabel());
resizeObserver.observe(document.getElementById('template-preview-container'));

window.addEventListener('DOMContentLoaded', () => {
    setPreviewMode('tablet');
});
</script>