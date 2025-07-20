</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // You can add JavaScript functionality here
        $(document).ready(function() {
            // Highlight active menu item
            $('.sidebar-menu a').on('click', function() {
                $('.sidebar-menu a').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</body>
</html>
