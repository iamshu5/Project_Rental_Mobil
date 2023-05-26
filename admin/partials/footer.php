                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-gradient-dark text-white mt-5">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; PROJECT AKHIR KELAS XI || ILHAM SHUBKHI 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
                

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= URL_WEB ?>assets/js/jquery.min.js"></script>
    <script src="<?= URL_WEB ?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= URL_WEB ?>assets/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= URL_WEB ?>assets/js/sb-admin-2.min.js"></script>

    <script src="<?= URL_WEB ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= URL_WEB ?>assets/js/dataTables.bootstrap4.min.js"></script>

    <script>
        const BASE_URL = '<?= URL_WEB ?>';

        function fixNumClock(num) {
            return num < 10 ? '0' + num : num;
        }

        function monthNumToString(num) {
            switch (num) {
                case 1:
                    return 'Januari';
                case 2:
                    return 'Februari';
                case 3:
                    return 'Maret';
                case 4:
                    return 'April';
                case 5:
                    return 'Mei';
                case 6:
                    return 'Juni';
                case 7:
                    return 'Juli';
                case 8:
                    return 'Agustus';
                case 9:
                    return 'September';
                case 10:
                    return 'Oktober';
                case 11:
                    return 'November';
                case 12:
                    return 'Desember';
            }
        }

        function initClock() {
            setInterval( () => {
                const dateInstance = new Date();
                const year = dateInstance.getFullYear();
                const month = monthNumToString( (dateInstance.getMonth() < 11 ? dateInstance.getMonth() + 1 : dateInstance.getMonth()) );
                const date = fixNumClock(dateInstance.getDate());
                const hours = fixNumClock(dateInstance.getHours());
                const minutes = fixNumClock(dateInstance.getMinutes());
                const seconds = fixNumClock(dateInstance.getSeconds());

                const currentDatetime = `${date} ${month} ${year} ${hours}:${minutes}:${seconds} WIB`;
                $('#clock-realtime').html(currentDatetime);
            }, 1000);
        }


        function hapusData(urlDelete, page) {
            const yes = confirm(`Apakah anda yakin, ingin menghapus salah satu data ${ page }?`);
            if( yes ) {
                location.href = BASE_URL + 'admin/'  + urlDelete;
            }
        }

        $(document).ready(function() {
            initClock();
            $('[id*=datatable]').DataTable({
                order: [0, 'desc']
            });
        });
    </script>