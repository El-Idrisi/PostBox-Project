// public/js/sidebar.js
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.querySelector('#menuButton');
    const closeSidebarButton = document.querySelector('#closeSidebarButton');
    const sidebar = document.querySelector('#sidebar');
    const content = document.querySelector('#content');

    // Open sidebar
    menuButton.addEventListener('click', function(event) {
        event.stopPropagation();
        toggleSidebar(true);
    });

    // Close sidebar
    closeSidebarButton.addEventListener('click', function(event) {
        event.stopPropagation();
        toggleSidebar(false);
    });

    // Prevent sidebar from closing when clicking inside it
    sidebar.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Function to toggle sidebar
    function toggleSidebar(open) {
        if (open) {
            sidebar.classList.add('show-sidebar');
            content.classList.add('content-shifted');
        } else {
            sidebar.classList.remove('show-sidebar');
            content.classList.remove('content-shifted');
        }
    }

    // Close sidebar on outside click
    document.addEventListener('click', function() {
        if (sidebar.classList.contains('show-sidebar')) {
            toggleSidebar(false);
        }
    });

    // Adjust layout on window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            toggleSidebar(true);
        } else {
            toggleSidebar(false);
        }
    });
});
