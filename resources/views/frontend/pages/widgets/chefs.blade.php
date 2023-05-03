<section id="chefs" class="chefs section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Chefs</h2>
            <p>Our <span>Proffesional</span> Chefs</p>
        </div>

        <div class="row gy-4">

            @foreach ($chefs as $chef)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                data-aos-delay="100">
                <div class="chef-member">
                    <div class="member-img">
                        <img src="{{ asset('uploads/chef') }}/{{ $chef->chef_image }}" class="img-fluid" alt="">
                        <div class="social">
                            <a href="#"><i class="bi bi-twitter"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>{{ $chef->name }}</h4>
                        <span>{{ $chef->position }}</span>
                        <p>{{ $chef->description }}</p>
                    </div>
                </div>
            </div><!-- End Chefs Member -->

            @endforeach
<!-- End Chefs Member -->
        </div>

    </div>
</section>
