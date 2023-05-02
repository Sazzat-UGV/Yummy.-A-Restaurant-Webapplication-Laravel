<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Book A Table</h2>
            <p>Book <span>Your Stay</span> With Us</p>
        </div>

        <div class="row g-0">

            <div class="col-lg-4 reservation-img" style="background-image: url({{ asset('assets/frontend') }}/img/reservation.jpg);"
                data-aos="zoom-out" data-aos-delay="200"></div>

            <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                <form action="{{ route('user.tableBook') }}" method="post" role="form" class="email-form"
                    data-aos="fade-up" data-aos-delay="100">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6">
                            <input type="text" name="name"  id="name"
                                placeholder="Your Name" class="form-control @error('name')
                                is-invalid
                                @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="email"  name="email" id="email"
                                placeholder="Your Email" class="form-control @error('email')
                                is-invalid
                                @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="text"  name="phone" id="phone"
                                placeholder="Your Phone" class="form-control @error('phone')
                                is-invalid
                                @enderror">
                                @error('phone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="date" name="date"  id="date"
                            class="form-control @error('date')
                            is-invalid
                            @enderror">
                            @error('date')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="time" name="time"  class="form-control @error('time')
                            is-invalid
                            @enderror">
                            @error('time')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <input type="number" placeholder="# of people" name="no_of_people" min="1" class="form-control @error('no_of_people')
                            is-invalid
                            @enderror">
                            @error('no_of_people')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <textarea  name="message" rows="5" placeholder="Message" class="form-control @error('message')
                        is-invalid
                        @enderror">
                        @error('message')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror</textarea>
                    </div>
                    <div class="text-center"><button class="mt-3" type="submit">Book a Table</button></div>
                </form>
            </div><!-- End Reservation Form -->

        </div>

    </div>
</section>
