<footer class="container-fluid no-left-padding no-right-padding footer-main">
    <!-- Container -->
    <div class="container">
        <hr/>
        <ul class="ftr-social">
            <li><a href="{{ env('FACEBOOK_URL') }}" title="Facebook"><i class="fab fa-facebook"></i>{{ env('FACEBOOK_NAME') }}</a></li>
            <li><a href="{{ env('YOUTUBE_URL') }}" title="Youtube"><i class="fab fa-youtube"></i>{{ env('YOUTUBE_NAME') }}</a></li>
            <li><a href="#" title="Line"><i class="fab fa-line"></i>{{ env('LINE_NAME') }}</a></li>
            <li><a href="#" title="Phone"><i class="fa fa-phone"></i>{{ env('PHONE_NUMBER') }}</a></li>
        </ul>
        <div class="copyright">
            <p>Copyright @ {{ date('Y').' '.env('APP_NAME') }}</p>
        </div>
    </div><!-- Container /- -->
</footer>
