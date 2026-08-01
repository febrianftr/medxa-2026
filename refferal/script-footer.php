    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/sketch.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap4.min.js"></script>
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <script src="js/script.js"></script>
    <script src="navbar.js"></script>
    <script src="ckeditor/ckeditor.js?v=<?= $random; ?>"></script>
    <script src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="js/jquery.datetimepicker.full.js"></script>
    <script src="../js/moment.min.js" />
    </script>
    <script src="../js/datetime-moment.js" />
    </script>
    <script type="text/javascript" src="../js/change-doctor-approved.js?v=<?= $random; ?>"></script>
    <script type="text/javascript" src="../js/sweetalert.min.js" />
    </script>

    <!-- =======menghapus border pada div======== -->
    <script>
        $(document).ready(function() {
            $.fn.dataTable.moment('DD-MM-YYYY HH:mm');
            $(".table-dicom").removeAttr("border", "1");
        })
    </script>
    <!-- =======menghapus border pada div======== -->

    <script>
        $(".table-dicom").on("click", "tbody tr", function(event) {
            $(this).addClass("highlight").siblings().removeClass("highlight");
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#incfont').click(function() {
                curSize = parseInt($('.body').css('font-size')) + 1;
                if (curSize <= 20)
                    $('.body').css('font-size', curSize);
            });
            $('#decfont').click(function() {
                curSize = parseInt($('.body').css('font-size')) - 1;
                if (curSize >= 10)
                    $('.body').css('font-size', curSize);
            });
        });
    </script>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
            $('.table-paginate').dataTable();
        });
    </script>

    <script>
        // untuk menampilkan data popup
        $(function() {
            $(document).on('click', '.hasil-all', function(e) {
                e.preventDefault();
                $("#modal-all").modal('show');
                $.post('../hasil-all.php', {
                        uid: $(this).attr('data-id')
                    },
                    function(html) {
                        $(".modal-body").html(html);
                    }
                );
            });
        });
        // end untuk menampilkan data popup
    </script>
    <script>
        // untuk menampilkan data popup
        $(function() {
            $(document).on('click', '.hasil-series', function(e) {
                e.preventDefault();
                $("#modal-series").modal('show');
                $.post('../hasil-series.php', {
                        uid: $(this).attr('data-id')
                    },
                    function(html) {
                        $(".modal-body").html(html);
                    }
                );
            });
        });
        // end untuk menampilkan data popup
    </script>
    <script>
        // untuk menampilkan data popup
        $(function() {
            $(document).on('click', '.hasil-radiographer', function(e) {
                e.preventDefault();
                $("#modal-radiographer").modal('show');
                $.post('../hasil-radiographer.php', {
                        uid: $(this).attr('data-id')
                    },
                    function(html) {
                        $(".modal-body").html(html);
                    }
                );
            });
        });
        // end untuk menampilkan data popup
    </script>

    <!-- right click disabled -->
    <!-- <script>
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        }, false);
    </script> -->

    <script>
        $(document).ready(function() {
            $(".disokin").fadeOut();
        })
    </script>

    <script>
        if ($(window).width() < 1115) {
            $('#logout2').removeClass('logout1');
        }
    </script>

    <script>
        const container = document.querySelector('.scroller-itwd , .table-box , .back-search');

        let startY;
        let startX;
        let scrollLeft;
        let scrollTop;
        let isDown;

        container.addEventListener('mousedown', e => mouseIsDown(e));
        container.addEventListener('mouseup', e => mouseUp(e))
        container.addEventListener('mouseleave', e => mouseLeave(e));
        container.addEventListener('mousemove', e => mouseMove(e));

        function mouseIsDown(e) {
            isDown = true;
            startY = e.pageY - container.offsetTop;
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
            scrollTop = container.scrollTop;
        }

        function mouseUp(e) {
            isDown = false;
        }

        function mouseLeave(e) {
            isDown = false;
        }

        function mouseMove(e) {
            if (isDown) {
                e.preventDefault();
                //Move vertcally
                const y = e.pageY - container.offsetTop;
                const walkY = y - startY;
                container.scrollTop = scrollTop - walkY;

                //Move Horizontally
                const x = e.pageX - container.offsetLeft;
                const walkX = x - startX;
                container.scrollLeft = scrollLeft - walkX;

            }
        }
    </script>

    // copy id to clipboard (copy link public) untuk ohif
    <script>
        function copyText(e, study_iuid) {
            e.preventDefault();
            swal({
                title: 'Copy',
                text: 'Link Has been Copied',
                icon: "success",
                timer: 1500,
            }).then(function() {
                const textarea = document.createElement('textarea');
                textarea.value = study_iuid;
                // Move the textarea outside the viewport to make it invisible
                textarea.style.position = 'absolute';
                textarea.style.left = '-99999999px';
                document.body.prepend(textarea);
                // highlight the content of the textarea element
                textarea.select();
                document.execCommand('copy');
            });
        }
    </script>

    <!-- new-sidebar -->
    <script>
        $(function() {
            // submenu toggle
            $(".menu-item1").on("click", function(e) {
                // prevent closing sidebar when clicking submenu
                e.stopPropagation();
                $(this).find(".submenu1").slideToggle(180);
                $(this).find(".fa-chevron-down").toggleClass("rotate1");
            });

            // toggle sidebar behaviour (desktop vs mobile)
            $("#sidebarToggle").on("click", function(e) {
                e.stopPropagation();
                var $btn = $(this);
                var $sidebar = $("#sidebar1");
                var $content = $("#content2");
                var isMobile = $(window).width() <= 768;

                if (isMobile) {
                    // mobile: toggle active1 on sidebar, toggle open1 on button
                    $sidebar.toggleClass("active1");
                    $btn.toggleClass("open1");
                } else {
                    // desktop: toggle collapsed1 and content full state
                    $sidebar.toggleClass("collapsed1");
                    $content.toggleClass("full1");
                    $btn.toggleClass("collapsed1");
                }
            });

            // click outside to close sidebar on mobile
            $(document).on("click", function(e) {
                var isMobile = $(window).width() <= 768;
                if (!isMobile) return;

                var $sidebar = $("#sidebar1");
                var $btn = $("#sidebarToggle");

                if ($sidebar.hasClass("active1")) {
                    // if click target is outside sidebar and not toggle button -> close
                    if ($(e.target).closest("#sidebar1").length === 0 && $(e.target).closest("#sidebarToggle").length === 0) {
                        $sidebar.removeClass("active1");
                        $btn.removeClass("open1");
                    }
                }
            });

            // on resize, reset conflicting classes so behaviour stays consistent
            $(window).on("resize", function() {
                if ($(window).width() > 768) {
                    // leave desktop behaviour: remove mobile-only classes
                    $("#sidebar1").removeClass("active1");
                    $("#sidebarToggle").removeClass("open1");
                } else {
                    // entering mobile: remove desktop collapsed states to avoid left:-250 stuck
                    $("#sidebar1").removeClass("collapsed1");
                    $("#content2").removeClass("full1");
                    $("#sidebarToggle").removeClass("collapsed1");
                }
            });
        });

        // Fungsi pencarian menu dan submenu
        $('#searchMenu1').on('keyup', function() {
            var keyword = $(this).val().toLowerCase();

            $('.menu-item1, .submenu1 a').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(keyword) > -1);
            });

            // Sembunyikan grup menu yang kosong
            $('.menu-group1').each(function() {
                var hasVisibleItems = $(this).find('.menu-item1:visible, .submenu1 a:visible').length > 0;
                $(this).toggle(hasVisibleItems);
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            // ====================================================
            // 1. MANAJEMEN TAMPILAN DROPDOWN
            // ====================================================

            // A. Toggle Date Dropdown (Manual Input)
            $('#filterToggle1').on('click', function(e) {
                e.preventDefault();
                $('#filterRangeDropdown').hide(); // Tutup dropdown sebelah
                $('#filterDropdown1').toggle(); // Buka/tutup dropdown ini
            });

            // B. Toggle Date Range Dropdown (Preset List)
            $('#filterRangeToggle').on('click', function(e) {
                e.preventDefault();
                $('#filterDropdown1').hide(); // Tutup dropdown sebelah
                $('#filterRangeDropdown').toggle(); // Buka/tutup dropdown ini
            });

            // C. Tutup dropdown jika klik di area luar
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#filterDropdown1, #filterToggle1').length) {
                    $('#filterDropdown1').hide();
                }
                if (!$(e.target).closest('#filterRangeDropdown, #filterRangeToggle').length) {
                    $('#filterRangeDropdown').hide();
                }
            });


            // ====================================================
            // 2. LOGIKA HITUNG TANGGAL (DATE RANGE)
            // ====================================================
            function getDatesForRange(range) {
                const today = new Date();
                const formatDate = (d) => {
                    let month = '' + (d.getMonth() + 1);
                    let day = '' + d.getDate();
                    let year = d.getFullYear();
                    if (month.length < 2) month = '0' + month;
                    if (day.length < 2) day = '0' + day;
                    return [year, month, day].join('-');
                };

                let from = '';
                let to = formatDate(today);

                switch (range) {
                    case 'this_year':
                        from = formatDate(new Date(today.getFullYear(), 0, 1));
                        break;
                    case 'last_7_days':
                        from = formatDate(new Date(today.getTime() - (7 * 24 * 60 * 60 * 1000)));
                        break;
                    case 'last_14_days':
                        from = formatDate(new Date(today.getTime() - (14 * 24 * 60 * 60 * 1000)));
                        break;
                    case 'last_30_days':
                        from = formatDate(new Date(today.getTime() - (30 * 24 * 60 * 60 * 1000)));
                        break;
                    case 'this_week':
                        const firstDayThisWeek = new Date(today.setDate(today.getDate() - today.getDay() + 1));
                        from = formatDate(firstDayThisWeek);
                        to = formatDate(new Date());
                        break;
                    case 'last_week':
                        const lastDayLastWeek = new Date(today.setDate(today.getDate() - today.getDay()));
                        to = formatDate(lastDayLastWeek);
                        const firstDayLastWeek = new Date(lastDayLastWeek);
                        firstDayLastWeek.setDate(lastDayLastWeek.getDate() - 6);
                        from = formatDate(firstDayLastWeek);
                        break;
                    case 'this_month':
                        from = formatDate(new Date(today.getFullYear(), today.getMonth(), 1));
                        to = formatDate(new Date());
                        break;
                    case 'last_month':
                        from = formatDate(new Date(today.getFullYear(), today.getMonth() - 1, 1));
                        to = formatDate(new Date(today.getFullYear(), today.getMonth(), 0));
                        break;
                    case 'custom':
                        return null;
                }
                return {
                    from,
                    to
                };
            }

            // Pilihan Range Date diklik
            $('.range-option').click(function(e) {
                e.preventDefault();
                const rangeType = $(this).data('range');
                const rangeText = $(this).text();

                if (rangeType !== 'custom') {
                    const dates = getDatesForRange(rangeType);
                    if (dates) {
                        $('#from_study_datetime').val(dates.from);
                        $('#to_study_datetime').val(dates.to);
                    }
                    $('#dateRangeBtnText').text(rangeText);
                } else {
                    $('#dateRangeBtnText').text('Custom');
                }

                $('#filterRangeDropdown').hide();
                updateFilterPreview();
            });


            // ====================================================
            // 3. MODALITY CHECK ALL
            // ====================================================
            $('#checkAll1').on('change', function() {
                const isChecked = $(this).is(':checked');
                $('.zone-check1').prop('checked', isChecked);
            });

            $(document).on('change', '.zone-check1', function() {
                const allZones = $('.zone-check1').length;
                const checkedZones = $('.zone-check1:checked').length;
                $('#checkAll1').prop('checked', allZones === checkedZones);
            });


            // ====================================================
            // 4. FUNGSI PREVIEW CHIPS & TEXT TOMBOL (GABUNGAN)
            // ====================================================
            let isManualInput = false;

            function updateFilterPreview() {
                const previewContainer = $('#selectedZonesPreview1');
                previewContainer.empty(); // Bersihkan container sebelum render ulang

                const fromDate = $('#from_study_datetime').val();
                const toDate = $('#to_study_datetime').val();

                // A. Update Teks di Tombol Filter Date
                let dateBtnText = 'All Time';
                if (fromDate && toDate) {
                    dateBtnText = `${fromDate} - ${toDate}`;
                } else if (fromDate) {
                    dateBtnText = `Since ${fromDate}`;
                } else if (toDate) {
                    dateBtnText = `Until ${toDate}`;
                }
                $('#datePreviewText').text(dateBtnText);

                if (isManualInput) {
                    $('#dateRangeBtnText').text('Custom');
                }

                // B. Menampilkan Chip Tag Filter Tanggal di Bawah
                if (fromDate || toDate) {
                    let dateText = '';
                    if (fromDate && toDate) {
                        dateText = `${fromDate} → ${toDate}`;
                    } else if (fromDate) {
                        dateText = `From: ${fromDate}`;
                    } else {
                        dateText = `To: ${toDate}`;
                    }
                    previewContainer.append(`<span class="zone-tag1" data-type="date">${dateText} <span class="remove-filter1" data-target="date">&times;</span></span>`);
                }

                // C. Menampilkan Chip Tag Inputan Text (Name, MRN, dll)
                $('.filter-input1').each(function() {
                    const val = $(this).val().trim();
                    const label = $(this).attr('placeholder') || $(this).attr('name');
                    if (val) {
                        previewContainer.append(`<span class="zone-tag1" data-type="text" data-target="#${this.id}">${label}: ${val} <span class="remove-filter1">&times;</span></span>`);
                    }
                });

                // D. Menampilkan Chip Tag Modalitas (Modality)
                const selectedZones = $('.zone-check1:checked').map(function() {
                    return $(this).val();
                }).get();
                selectedZones.forEach(zone => {
                    previewContainer.append(`<span class="zone-tag1" data-type="zone" data-zone="${zone}">${zone} <span class="remove-filter1">&times;</span></span>`);
                });
            }


            // ====================================================
            // 5. EVENT HAPUS CHIP (TANDA X PADA PREVIEW)
            // ====================================================
            $(document).on('click', '.remove-filter1', function() {
                const chip = $(this).parent('.zone-tag1');
                const type = chip.data('type');

                if (type === 'zone') {
                    const zoneName = chip.data('zone');
                    $('.zone-check1').filter(function() {
                        return $(this).val() === zoneName;
                    }).prop('checked', false);
                } else if (type === 'date') {
                    $('#from_study_datetime, #to_study_datetime').val('');
                    $('#dateRangeBtnText').text('Date Range Filter'); // Kembalikan ke text default
                } else if (type === 'text') {
                    const target = chip.data('target');
                    $(target).val('');
                }

                const allZones = $('.zone-check1').length;
                const checkedZones = $('.zone-check1:checked').length;
                $('#checkAll1').prop('checked', allZones === checkedZones);

                updateFilterPreview();
            });


            // Trigger setiap kali ada inputan yang berubah
            $(document).on('input change blur', '.filter-input1, .zone-check1, #checkAll1', function() {
                updateFilterPreview();
            });

            // Trigger khusus untuk input tanggal agar bisa memicu "Custom" di Date Range
            $(document).on('input change', '#from_study_datetime, #to_study_datetime', function() {
                isManualInput = true;
                updateFilterPreview();
                isManualInput = false;
            });

            // Inisialisasi tampilan awal
            updateFilterPreview();


            // ====================================================
            // 6. ANIMASI ICON SIDEBAR
            // ====================================================
            const $toggleBtn = $('#sidebarToggle');

            if ($(window).width() <= 768) {
                $toggleBtn.addClass('active');
            }

            $toggleBtn.click(function() {
                $(this).toggleClass('active');
            });

            $(window).resize(function() {
                if ($(window).width() <= 768) {
                    $toggleBtn.addClass('active');
                } else {
                    $toggleBtn.removeClass('active');
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            // ====================================================
            // 1. MANAJEMEN TAMPILAN DROPDOWN
            // ====================================================

            // A. Toggle Date Dropdown (Manual Input)
            $('#filterToggle1').on('click', function(e) {
                e.preventDefault();
                $('#filterRangeDropdown').hide(); // Tutup dropdown sebelah
                $('#filterDropdown1').toggle(); // Buka/tutup dropdown ini
            });

            // B. Toggle Date Range Dropdown (Preset List)
            $('#filterRangeToggle').on('click', function(e) {
                e.preventDefault();
                $('#filterDropdown1').hide(); // Tutup dropdown sebelah
                $('#filterRangeDropdown').toggle(); // Buka/tutup dropdown ini
            });

            // C. Tutup dropdown jika klik di area luar
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#filterDropdown1, #filterToggle1').length) {
                    $('#filterDropdown1').hide();
                }
                if (!$(e.target).closest('#filterRangeDropdown, #filterRangeToggle').length) {
                    $('#filterRangeDropdown').hide();
                }
            });


            // ====================================================
            // 2. LOGIKA HITUNG TANGGAL (DATE RANGE)
            // ====================================================
            function getDatesForRange(range) {
                const today = new Date();
                const formatDate = (d) => {
                    let month = '' + (d.getMonth() + 1);
                    let day = '' + d.getDate();
                    let year = d.getFullYear();
                    if (month.length < 2) month = '0' + month;
                    if (day.length < 2) day = '0' + day;
                    return [year, month, day].join('-');
                };

                let from = '';
                let to = formatDate(today);

                switch (range) {
                    case 'this_year':
                        from = formatDate(new Date(today.getFullYear(), 0, 1));
                        break;
                    case 'last_7_days':
                        from = formatDate(new Date(today.getTime() - (7 * 24 * 60 * 60 * 1000)));
                        break;
                    case 'last_14_days':
                        from = formatDate(new Date(today.getTime() - (14 * 24 * 60 * 60 * 1000)));
                        break;
                    case 'last_30_days':
                        from = formatDate(new Date(today.getTime() - (30 * 24 * 60 * 60 * 1000)));
                        break;
                    case 'this_week':
                        const firstDayThisWeek = new Date(today.setDate(today.getDate() - today.getDay() + 1));
                        from = formatDate(firstDayThisWeek);
                        to = formatDate(new Date());
                        break;
                    case 'last_week':
                        const lastDayLastWeek = new Date(today.setDate(today.getDate() - today.getDay()));
                        to = formatDate(lastDayLastWeek);
                        const firstDayLastWeek = new Date(lastDayLastWeek);
                        firstDayLastWeek.setDate(lastDayLastWeek.getDate() - 6);
                        from = formatDate(firstDayLastWeek);
                        break;
                    case 'this_month':
                        from = formatDate(new Date(today.getFullYear(), today.getMonth(), 1));
                        to = formatDate(new Date());
                        break;
                    case 'last_month':
                        from = formatDate(new Date(today.getFullYear(), today.getMonth() - 1, 1));
                        to = formatDate(new Date(today.getFullYear(), today.getMonth(), 0));
                        break;
                    case 'custom':
                        return null;
                }
                return {
                    from,
                    to
                };
            }

            // Pilihan Range Date diklik
            $('.range-option').click(function(e) {
                e.preventDefault();
                const rangeType = $(this).data('range');
                const rangeText = $(this).text();

                if (rangeType !== 'custom') {
                    const dates = getDatesForRange(rangeType);
                    if (dates) {
                        $('#from_study_datetime').val(dates.from);
                        $('#to_study_datetime').val(dates.to);
                    }
                    $('#dateRangeBtnText').text(rangeText);
                } else {
                    $('#dateRangeBtnText').text('Custom');
                }

                $('#filterRangeDropdown').hide();
                updateFilterPreview();
            });


            // ====================================================
            // 3. MODALITY CHECK ALL
            // ====================================================
            $('#checkAll1').on('change', function() {
                const isChecked = $(this).is(':checked');
                $('.zone-check1').prop('checked', isChecked);
            });

            $(document).on('change', '.zone-check1', function() {
                const allZones = $('.zone-check1').length;
                const checkedZones = $('.zone-check1:checked').length;
                $('#checkAll1').prop('checked', allZones === checkedZones);
            });


            // ====================================================
            // 4. FUNGSI PREVIEW CHIPS & TEXT TOMBOL (GABUNGAN)
            // ====================================================
            let isManualInput = false;

            function updateFilterPreview() {
                const previewContainer = $('#selectedZonesPreview1');
                previewContainer.empty(); // Bersihkan container sebelum render ulang

                const fromDate = $('#from_study_datetime').val();
                const toDate = $('#to_study_datetime').val();

                // A. Update Teks di Tombol Filter Date
                let dateBtnText = 'All Time';
                if (fromDate && toDate) {
                    dateBtnText = `${fromDate} - ${toDate}`;
                } else if (fromDate) {
                    dateBtnText = `Since ${fromDate}`;
                } else if (toDate) {
                    dateBtnText = `Until ${toDate}`;
                }
                $('#datePreviewText').text(dateBtnText);

                if (isManualInput) {
                    $('#dateRangeBtnText').text('Custom');
                }

                // B. Menampilkan Chip Tag Filter Tanggal di Bawah
                if (fromDate || toDate) {
                    let dateText = '';
                    if (fromDate && toDate) {
                        dateText = `${fromDate} → ${toDate}`;
                    } else if (fromDate) {
                        dateText = `From: ${fromDate}`;
                    } else {
                        dateText = `To: ${toDate}`;
                    }
                    previewContainer.append(`<span class="zone-tag1" data-type="date">${dateText} <span class="remove-filter1" data-target="date">&times;</span></span>`);
                }

                // C. Menampilkan Chip Tag Inputan Text (Name, MRN, dll)
                $('.filter-input1').each(function() {
                    const val = $(this).val().trim();
                    const label = $(this).attr('placeholder') || $(this).attr('name');
                    if (val) {
                        previewContainer.append(`<span class="zone-tag1" data-type="text" data-target="#${this.id}">${label}: ${val} <span class="remove-filter1">&times;</span></span>`);
                    }
                });

                // D. Menampilkan Chip Tag Modalitas (Modality)
                const selectedZones = $('.zone-check1:checked').map(function() {
                    return $(this).val();
                }).get();
                selectedZones.forEach(zone => {
                    previewContainer.append(`<span class="zone-tag1" data-type="zone" data-zone="${zone}">${zone} <span class="remove-filter1">&times;</span></span>`);
                });
            }


            // ====================================================
            // 5. EVENT HAPUS CHIP (TANDA X PADA PREVIEW)
            // ====================================================
            $(document).on('click', '.remove-filter1', function() {
                const chip = $(this).parent('.zone-tag1');
                const type = chip.data('type');

                if (type === 'zone') {
                    const zoneName = chip.data('zone');
                    $('.zone-check1').filter(function() {
                        return $(this).val() === zoneName;
                    }).prop('checked', false);
                } else if (type === 'date') {
                    $('#from_study_datetime, #to_study_datetime').val('');
                    $('#dateRangeBtnText').text('Date Range Filter'); // Kembalikan ke text default
                } else if (type === 'text') {
                    const target = chip.data('target');
                    $(target).val('');
                }

                const allZones = $('.zone-check1').length;
                const checkedZones = $('.zone-check1:checked').length;
                $('#checkAll1').prop('checked', allZones === checkedZones);

                updateFilterPreview();
            });


            // Trigger setiap kali ada inputan yang berubah
            $(document).on('input change blur', '.filter-input1, .zone-check1, #checkAll1', function() {
                updateFilterPreview();
            });

            // Trigger khusus untuk input tanggal agar bisa memicu "Custom" di Date Range
            $(document).on('input change', '#from_study_datetime, #to_study_datetime', function() {
                isManualInput = true;
                updateFilterPreview();
                isManualInput = false;
            });

            // Inisialisasi tampilan awal
            updateFilterPreview();


            // ====================================================
            // 6. ANIMASI ICON SIDEBAR
            // ====================================================
            const $toggleBtn = $('#sidebarToggle');

            if ($(window).width() <= 768) {
                $toggleBtn.addClass('active');
            }

            $toggleBtn.click(function() {
                $(this).toggleClass('active');
            });

            $(window).resize(function() {
                if ($(window).width() <= 768) {
                    $toggleBtn.addClass('active');
                } else {
                    $toggleBtn.removeClass('active');
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('.arrow-sidebar').on('click', function() {
                // Toggle class 'collapsed' pada button atau icon
                $(this).find('.icon-sidebar').toggleClass('rotate-180');
            });
        });
    </script>