        <section id="events" class="events">
            <div class="container-fluid" data-aos="fade-up">

                <div class="section-header">
                    <h2>Events</h2>
                    <p>Share <span>Your Moments</span> In Our Restaurant</p>
                </div>

                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">
                        @foreach ($events as $event)
                            <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                                style="background-image: url({{ asset('uploads/event_photo') }}/{{ $event->event_image }})">
                                <h3>{{ $event->event_name }}</h3>
                                <div class="price align-self-start">${{ $event->price }}</div>
                                <p class="description">
                                    {{ $event->description }}
                                </p>
                            </div><!-- End Event item -->
                            <!-- End Event item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
