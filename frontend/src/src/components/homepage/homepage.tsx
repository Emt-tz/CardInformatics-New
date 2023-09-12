
import ImgSlide4 from '~/media/homepage/image/slide_4.jpg?jsx';
import ImgSlide3 from '~/media/homepage/image/slide_3.jpg?jsx';
import ImgSlide2 from '~/media/homepage/image/slide_2.jpg?jsx';
import ImgSlide1 from '~/media/homepage/image/slide_1.jpg?jsx'; import { component$ } from "@builder.io/qwik";


export const HomePageSubHeader = component$(() => {
    return (
        <>
            {/* <!-- ======= Top Bar ======= --> */}
            <div id="topbar" class="d-flex align-items-center fixed-top">
                <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-phone"></i> Tupigie Kupitia +255 22 261 0310 / +255 736 836 936
                    </div>
                </div>
            </div>

            {/* <!-- ======= Header ======= --> */}
            <header id="header" class="fixed-top">
                <div class="container d-flex align-items-center">

                    <a href="/" class="logo me-auto"> C.A.R.D Informatics </a>
                    {/* <!-- Uncomment below if you prefer to use an image logo --> */}

                    <nav id="navbar" class="navbar order-last order-lg-0">
                        <ul>
                            <li><a class="nav-link scrollto " href="#hero"> Nyumbani </a></li>
                            <li><a class="nav-link scrollto" href="#aboutUs"> Kuhusu Sisi </a></li>
                            <li><a class="nav-link scrollto" href="#ourServices"> Huduma Zetu </a></li>
                            <li><a class="nav-link scrollto" href="/auth/register"> Jisajili </a></li>
                            <li><a class="nav-link scrollto" href="/auth/login"> Ingia </a></li>
                            <li><a class="nav-link scrollto" href="#contact"> Wasiliana Nasi </a></li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav>
                    {/* <!-- .navbar --> */}
                    <a href="/en" class="appointment-btn scrollto"><span class="d-none d-md-inline"> English </span></a>
                </div>
            </header>
            {/* <!-- End Header --> */}

            {/* <!-- ======= Hero Section ======= --> */}
            <section id="hero">
                <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                    <div class="carousel-inner" role="listbox" >

                        {/* <!-- Slide 1 --> */}
                        <div class="carousel-item active" style="background-image: url(/homepage/image/slide_1.jpg)" data-lazy="true">
                            <div class="container">
                                <h2>Karibu <span style="color: #27B8E7;">C.A.R.D. Informatics LTD </span></h2>
                                <p>
                                    C.A.R.D. Informatics huchukua taarifa za miamala ya kifedha na kuibadilisha kuwa pakiti za taarifa za kina kulingana na vigezo vya fedha za miamala hiyo.
                                </p>

                                <a href="#aboutUs" class="btn-get-started scrollto">Soma Zaidi</a>
                            </div>
                        </div>

                        {/* <!-- Slide 2 --> */}
                        <div class="carousel-item" style="background-image: url(/homepage/image/slide_2.jpg)" data-lazy="true">
                            <div class="container">
                                <h2>Maombi ya mikopo <span style="color: #27B8E7;">kwa taasisi za fedha</span></h2>
                                <p>
                                    Fomu za maombi zilizoratibiwa ambazo zinashughulikiwa na kuwekwa kwenye soko ambapo taasisi za fedha zinazoshiriki zinaweza kukagua na kuchagua ikiwa wataweza kutoa mkopo.
                                </p>
                            </div>
                        </div>

                        {/* <!-- Slide 3 --> */}
                        <div class="carousel-item" style="background-image: url(/homepage/image/slide_3.jpg)" data-lazy="true">
                            <div class="container">
                                <h2>Ofa za <span style="color: #27B8E7; ">taasisi za fedha</span></h2>
                                <p>
                                    Mara kwa mara, taasisi za fedha huweka matangazo na kuuza bidhaa kwa wateja wao na watumiaji wengine. Jukwaa letu linawawezesha kutangaza matoleo yao ya mikopo na kulenga msingi wa watumiaji ambao unapita zaidi ya msingi wao wa jadi wa wateja.
                                </p>
                            </div>
                        </div>

                        {/* <!-- Slide 4 --> */}
                        <div class="carousel-item" style="background-image: url(/homepage/image/slide_4.jpg)" data-lazy="true">
                            <div class="container">
                                <h2>Vifurushi vya <span style="color: #27B8E7;"> Usafiri na Burudani </span></h2>
                                <p>
                                    Kwa vile Tanzania ni soko fikio la utalii na burudani, Wateja washirika wetu katika tasnia ya ukarimu hutangaza mara kwa mara vifurushi vinavyolenga kuimarisha utalii wa ndani.
                                </p>
                            </div>
                        </div>

                    </div>

                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                    </a>

                </div>
            </section>
            {/* <!-- End Hero --> */}
        </>
    )
})

export const HomePageMain = component$(() => {
    return (
        <>
            {/* <!-- ======= Featured Services Section ======= --> */}
            <section id="featured-services" class="featured-services">

                <div class="container" data-aos="fade-up">

                    <div class="row">

                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon"><i class="bi bi-bank"></i></div>
                                <h4 class="title"><a href=""> Maombi ya mikopo kwa taasisi za fedha </a></h4>
                                <p class="description">
                                    Fomu za maombi zilizoratibiwa ambazo zinashughulikiwa na kuwekwa kwenye soko ambapo taasisi za kifedha zinazoshiriki zinaweza kukagua na kuchagua ikiwa kutoa mkopo.
                                </p>

                                <a href="#ourServices" class="btn" style="background-color: white; color: black;">Soma Zaidi</a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon"><i class="bi bi-credit-card"></i></div>
                                <h4 class="title"><a href=""> Ofa za taasisi za fedha </a></h4>
                                <p class="description">
                                    Mara kwa mara, taasisi za fedha huweka matangazo na kuuza bidhaa kwa wateja wao na watumiaji wengine. Jukwaa letu linawawezesha kutangaza matoleo yao ya mikopo na kulenga msingi wa watumiaji ambao unapita zaidi ya msingi wao wa jadi wa wateja.
                                </p>

                                <a href="#ourServices" class="btn" style="background-color: white; color: black;">Soma Zaidi</a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon"><i class="bi bi-bus-front"></i></div>
                                <h4 class="title"><a href=""> Vifurushi vya Usafiri na Burudani </a></h4>
                                <p class="description">
                                    Kama Tanzania ni soko la marudio kwa kusafiri, utalii, na burudani, wateja wetu washirika katika tasnia ya ukarimu hutangaza mara kwa mara vifurushi ambavyo vinawawezesha mkopo kununua likizo inayohitajika sana au adha. Jukwaa letu linaunganisha watumiaji wetu na taasisi za kifedha ambazo zinaweza kukagua matumizi ya familia au likizo ya kikundi na kupima ikiwa mwombaji anastahili mkopo kwa kifurushi hicho.
                                </p>

                                <a href="#ourServices" class="btn" style="background-color: white; color: black;">Soma Zaidi</a>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            {/* <!-- End Featured Services Section --> */}


            {/* <!-- ======= Cta Section ======= --> */}
            <section id="cta" class="cta">
                <div class="container" data-aos="zoom-in">

                    <div class="text-center">
                        <a class="cta-btn scrollto" href="/auth/login"> Ingia </a>
                    </div>

                </div>
            </section>
            {/* <!-- End Cta Section --> */}

            


            {/* <!-- ======= Cta Section ======= --> */}
            <section id="cta" class="cta">
                <div class="container" data-aos="zoom-in">

                    <div class="text-center">
                        <a class="cta-btn scrollto" href="/auth/register"> Jisajili </a>
                    </div>

                </div>
            </section>
            {/* <!-- End Cta Section --> */}

            {/* <!-- ======= Departments Section ======= --> */}
            <section id="ourServices" class="departments">
                <div class="container" data-aos="fade-up">

                    <div class="section-title cta">
                        <h2> Huduma Zetu </h2>
                        <p>
                            Mfumo wetu ni wa mtandaoni, ambao mtumiaji atafungua akaunti ambayo itamuruhusu kuwasilisha maombi ya mkopo kwa Taasisi mbalimbali za fedha, atatazama baadhi ya mikopo inayotolewa na taasisi za fedha, pia atapokea taarifa za kielektroniki juu ya maamuzi, na atapokea taarifa za hali ya mikopo inayosubiri. <br />
                            Mfumo wa kielektroniki wa Kampuni yetu unawezesha watu binafsi, taasisi za fedha, wawakilishi walioidhinishwa, na watumiaji wengine kutumia akaunti zao za mtandaoni kwa urahisi zaidi na kwa usalama. Pia, usajili kwa njia ya kielektroniki, maombi na nyaraka shirikishi, mtumiaji anaweza kupokea na kujibu arifa, maombi ya ushahidi, na kutazama maamuzi ambayo yamewasilishwa kwa njia ya kielektroniki. Mara kwa mara, kampuni itatoa utendaji wa ziada ambao ungeruhusu watumiaji, taasisi za fedha, na wawakilishi walioidhinishwa kutekeleza majukumu ya ziada mtandaoni, majukumu hayo yanaweza kujumuisha kuwasilisha hoja ili kufungua upya au kufikiria upya maudhui.
                        </p>
                    </div>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <ul class="nav nav-tabs flex-column">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                                        <h4>Soko Letu</h4>
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                        <h4>Maombi ya mikopo kwa taasisi za fedha</h4>
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                                        <h4>Ofa za taasisi za fedha</h4>
                                    </a>
                                </li>
                                <li class="nav-item mt-2">
                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                                        <h4>Vifurushi vya Usafiri na Burudani</h4>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            <div class="tab-content">
                                <div class="tab-pane active show" id="tab-1">
                                    <h3>Soko Letu</h3>

                                    <ImgSlide1 alt="" class="img-fluid" data-lazy="true" />
                                    <p>
                                        Tunafafanua soko letu kama huduma za msingi katika utoaji mikopo, kukopesha bila kuorodhesha usalama. Soko hili lina takribani watu wazima milioni 32, sehemu hiyo inatarajiwa kukua kwa kiasi kikubwa kutokana na janga la corona kupungua na mfumo mkali wa kutengeneza sera za biashara/uwekezaji.
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab-2">
                                    <h3>Maombi ya mikopo kwa taasisi za fedha</h3>

                                    <ImgSlide2 alt="" class="img-fluid" data-lazy="true" />
                                    <p>
                                        Fomu za maombi zilizoratibiwa ambazo zinashughulikiwa na kuwekwa kwenye soko ambapo taasisi za kifedha zinazoshiriki zinaweza kukagua na kuchagua ikiwa kutoa mkopo.
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab-3">
                                    <h3>Ofa za taasisi za fedha</h3>

                                    <ImgSlide3 alt="" class="img-fluid" data-lazy="true" />
                                    <p>
                                        Mara kwa mara, taasisi za fedha huweka matangazo na kuuza bidhaa kwa wateja wao na watumiaji wengine. Jukwaa letu linawawezesha kutangaza matoleo yao ya mikopo na kulenga msingi wa watumiaji ambao unapita zaidi ya msingi wao wa jadi wa wateja.
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab-4">
                                    <h3>Vifurushi vya Usafiri na Burudani</h3>

                                    <ImgSlide4 alt="" class="img-fluid" data-lazy="true" />
                                    <p>
                                        Kama Tanzania ni soko la marudio kwa kusafiri, utalii, na burudani, wateja wetu washirika katika tasnia ya ukarimu hutangaza mara kwa mara vifurushi ambavyo vinawawezesha mkopo kununua likizo inayohitajika sana au adha. Jukwaa letu linaunganisha watumiaji wetu na taasisi za kifedha ambazo zinaweza kukagua matumizi ya familia au likizo ya kikundi na kupima ikiwa mwombaji anastahili mkopo kwa kifurushi hicho.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            {/* <!-- End Departments Section --> */}

            {/* <!-- ======= Contact Section ======= --> */}
            <section id="contact" class="contact" data-aos="fade-up">
                <div class="section-title">
                    <h2> Wasiliana Nasi </h2>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.com/maps?q=Acacia Estate Offices 84 Barabara ya Kinondoni&t=&z=16&ie=UTF8&iwloc=&output=embed" frameBorder="0" allowFullScreen={false}></iframe>
                </div>

                <div class="container">

                    <div class="row mt-5">

                        <div class="col-lg-6">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="info-box">
                                        <i class="bx bx-map"></i>
                                        <h3> Anwani </h3>

                                        <p> Acacia Estate Offices, 84 Barabara ya Kinondoni,<br />
                                            Sanduku la Posta 75236, Dar Es Salaam, Tanzania
                                        </p>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-box mt-4">
                                        <i class="bx bx-envelope"></i>
                                        <h3> Barua pepe </h3>
                                        <a href="mailto: info@cardinformatics.co.tz" class="link_style">info@cardinformatics.co.tz</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-box mt-4">
                                        <i class="bx bx-phone-call"></i>
                                        <h3> Simu </h3>
                                        <p> +255 22 261 0310 / +255 736 836 936 </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6">

                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bx bi-chat-square"></i>
                                    <h3> Maoni </h3>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="info_form">
                                    <form action="feedback.php" method="POST">

                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="f_name" class="form-control" id="name" placeholder="Jina Lako " required={false} />
                                            </div>
                                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                                <input type="email" class="form-control input_text" name="email" id="email" placeholder="Barua pepe Yako" required={false} />
                                            </div>
                                        </div>
                                        <div class="form-group mt-3">
                                            <textarea class="form-control area_text" name="feedback" rows={2} placeholder=" Maoni Yako " required={false}></textarea>
                                        </div>
                                        <br />
                                        <div class="text-center">
                                            <button type="submit" class="appointment-btn" name="send_feedback"> Tuma Maoni </button>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>


                    </div>

                </div>
            </section>
            {/* <!-- End Contact Section --> */}
        </>
    )
})

export const HomePageFooter = component$(() => {
    return (
        <>
            {/* <!-- ======= Footer ======= --> */}
            <footer id="footer">
                <div class="container">

                    <div class="copyright">
                        © <script>document.write(new Date().getFullYear());</script> C.A.R.D. Informatics | All Rights Reserved | <a href="terms/Privacy_Statement_fin.php" target="_blank"> Privacy Policy Statement</a>
                    </div>

                </div>
            </footer>
            {/* <!-- End Footer --> */}

            <div id="preloader"></div>
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            {/* <!-- Vendor JS Files --> */}
            <script src="/homepage/vendor/purecounter/purecounter_vanilla.js"></script>
            <script src="/homepage/vendor/aos/aos.js"></script>
            <script src="/homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="/homepage/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="/homepage/vendor/swiper/swiper-bundle.min.js"></script>
            <script src="/homepage/vendor/php-email-form/validate.js"></script>

            {/* <!-- Template Main JS File --> */}
            <script src="/homepage/js/main.js"></script>
        </>
    )
})

export const HomePage = component$(() => {
    return (
        <>
            <HomePageSubHeader />
            <HomePageMain />
            <HomePageFooter />
        </>
    )
})