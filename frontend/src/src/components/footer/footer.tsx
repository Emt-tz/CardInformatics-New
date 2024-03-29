import { component$ } from "@builder.io/qwik";

export const Footer = component$(() => {
    return (
        <>
            {/* <!-- ======= Footer ======= --> */}
            <footer id="footer" class="footer">
                <div class="copyright">
                    &copy;<strong><span>{`${new Date().getFullYear()}`} C.A.R.D. Informatics</span></strong>. All Rights Reserved
                </div>
                {/* <div class="credits">
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div> */}
            </footer>
            {/* <!-- End Footer --> */}

            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

            {/* <!-- Vendor JS Files --> */}
            <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>
            <script src="/vendor/php-email-form/validate.js"></script>
            <script src="/vendor/quill/quill.min.js"></script>
            <script src="/vendor/tinymce/tinymce.min.js"></script>
            <script src="/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="/vendor/chart.js/chart.min.js"></script>
            <script src="/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="/vendor/echarts/echarts.min.js"></script>

            {/* <!-- Template Main JS File --> */}
            <script src="/js/main.js"></script>
        </>
    );
});