<style>
    .bannr-section {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat; 
    }
</style>

<section class="bannr-section" 
         data-desktop-image="{{ asset('images/Contents/' . $contents->desktop_about_image) }}" 
         data-mobile-image="{{ asset('images/Contents/' . $contents->mobile_about_image) }}">

    <div class="container">
        <div class="bannr-text">
            <h2>من نحن</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">الصفحة الرئيسية</a>
                </li>
            </ol>
        </div>
    </div>
    <img src="assets/img/extra-images-2.png" alt="icon" class="extra-images-two">
    <img src="assets/img/dots-1.png" alt="img" class="dots">
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bannrSection = document.querySelector('.bannr-section');

        function updateBackgroundImage() {
            const isMobile = window.innerWidth < 768;
            const desktopImage = bannrSection.getAttribute('data-desktop-image');
            const mobileImage = bannrSection.getAttribute('data-mobile-image');
            const imageUrl = isMobile ? mobileImage : desktopImage;
            bannrSection.style.backgroundImage = `url('${imageUrl}')`;
        }

        // Initial load
        updateBackgroundImage();

        // Update on window resize
        window.addEventListener('resize', updateBackgroundImage);
    });
</script>
