<!-- Common Modal Template -->
<div id="common-modal"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 hidden overflow-y-auto">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-md w-full max-h-full" id="common-modal-content">
        <!-- Header -->
        <div class="px-5 py-3 border-b border-gray-200 dark:border-gray-700/60">
            <div class="flex justify-between items-center">
                <div class="font-semibold text-gray-800 dark:text-gray-100" id="common-modal-title">Modal</div>
                <button id="close-modal-icon" onclick="hideCommonModal()"
                    class="text-gray-400 cursor-pointer dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400">
                    <div class="sr-only">Close</div>
                    <svg class="fill-current" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M7.95 6.536l4.242-4.243a1 1 0 111.415 1.414L9.364 7.95l4.243 4.242a1 1 0 11-1.415 1.415L7.95 9.364l-4.243 4.243a1 1 0 01-1.414-1.415L6.536 7.95 2.293 3.707a1 1 0 011.414-1.414L7.95 6.536z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Body -->
        <div class="common-modal-body">
            
        </div>
    </div>
</div>
