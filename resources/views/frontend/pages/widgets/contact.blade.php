<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Contact</h2>
            <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
            <iframe style="border:0; width: 100%; height: 350px;"
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-map flex-shrink-0"></i>
                    <div>
                        <h3>Our Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item d-flex align-items-center">
                    <i class="icon bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>contact@example.com</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
                <div class="info-item  d-flex align-items-center">
                    <i class="icon bi bi-share flex-shrink-0"></i>
                    <div>
                        <h3>Opening Hours</h3>
                        <div><strong>Mon-Sat:</strong> 11AM - 23PM;
                            <strong>Sunday:</strong> Closed
                        </div>
                    </div>
                </div>
            </div><!-- End Info Item -->

        </div>

        <form action="{{ route('user.contact') }}" method="post"  class="email-form p-3 p-md-4">
            @csrf
            <div class="row">
                <div class="col-xl-6 form-group">
                    <input type="text" name="name"
                        placeholder="Your Name" class="form-control @error('name')
                        is-invalid
                        @enderror">
                        @error('name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                <div class="col-xl-6 form-group">
                    <input type="email"  name="email"
                        placeholder="Your Email" class="form-control @error('email')
                        is-invalid
                        @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
            </div>
            <div class="form-group">
                <input type="text"  name="subject"
                    placeholder="Subject" class="form-control @error('subject')
                    is-invalid
                    @enderror">
                    @error('subject')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
            </div>
            <div class="form-group">
                <textarea name="message" rows="5" placeholder="Message" class="form-control @error('message')
                is-invalid
                @enderror">
                @error('message')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror</textarea>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
        <!--End Contact Form -->

    </div>
</section>
