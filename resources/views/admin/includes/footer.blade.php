<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                © Maisha Infotech.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Maisha Infotech
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2KE5mhINTL3jm_2rDDKgp5O3yZjSOP2U"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/auth.js')}}"></script>
<script src="{{ asset('assets/js/role.js')}}"></script>
<script src="{{ asset('assets/js/vehicle.js')}}"></script>
<script src="{{ asset('assets/js/product_category.js')}}"></script>
<script src="{{ asset('assets/js/product.js')}}"></script>
<script src="{{ asset('assets/js/purchase_order.js')}}"></script>
<script src="{{ asset('assets/js/common.js')}}"></script>
<script src="{{ asset('assets/js/vendor.js')}}"></script>
<script src="{{ asset('assets/js/customer.js')}}"></script>
<script src="{{ asset('assets/js/business_type.js')}}"></script>
<script src="{{ asset('assets/js/notification.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{ asset('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{ asset('assets/js/plugins.js')}}"></script>
<script src="{{ asset('assets/js/pages/password-addon.init.js')}}"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- Vector map-->
<script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

<!--Swiper slider js-->
<script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js')}}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js')}}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js')}}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>

<script>
    self.addEventListener('install', function(event) {

        event.waitUntil(

            caches.open('v1').then(function(cache) {

                return cache.addAll([

                    '/index.html',

                    '/styles.css',

                    '/script.js',

                    '/images/logo.png'

                ]);

            })

        );

    });



    self.addEventListener('fetch', function(event) {

        event.respondWith(

            caches.match(event.request).then(function(response) {

                return response || fetch(event.request);

            })

        );

    });
</script>