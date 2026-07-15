import $ from 'jquery';

$(function () {
    /* ---------------------------------------------------------
     * Preloader
     * ------------------------------------------------------- */
    $(window).on('load', function () {
        $('#preloader').css('opacity', 0);
        setTimeout(() => $('#preloader').remove(), 500);
    });

    /* ---------------------------------------------------------
     * Sticky navbar shrink + shadow on scroll
     * ------------------------------------------------------- */
    const $headerInner = $('#site-header-inner');

    function handleHeaderScroll() {
        if ($(window).scrollTop() > 30) {
            $headerInner.addClass('mt-0 !py-2.5');
        } else {
            $headerInner.removeClass('mt-0 !py-2.5');
        }
    }
    $(window).on('scroll', handleHeaderScroll);
    handleHeaderScroll();

    /* ---------------------------------------------------------
     * Mobile hamburger menu
     * ------------------------------------------------------- */
    const $mobileToggle = $('#mobile-menu-toggle');
    const $mobileMenu = $('#mobile-menu');

    $mobileToggle.on('click', function () {
        const expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', String(!expanded));
        $('#icon-burger').toggleClass('hidden');
        $('#icon-close').toggleClass('hidden');
        $mobileMenu.toggleClass('hidden');
    });

    $('.mobile-nav-link').on('click', function () {
        $mobileMenu.addClass('hidden');
        $('#icon-burger').removeClass('hidden');
        $('#icon-close').addClass('hidden');
        $mobileToggle.attr('aria-expanded', 'false');
    });

    /* ---------------------------------------------------------
     * Active menu highlight on scroll
     * ------------------------------------------------------- */
    const $sections = $('main section[id]');
    const $navTargets = $('[data-nav-target]');

    function highlightActiveNav() {
        const scrollPos = $(window).scrollTop() + 140;
        let currentId = null;

        $sections.each(function () {
            const top = $(this).offset().top;
            const bottom = top + $(this).outerHeight();
            if (scrollPos >= top && scrollPos < bottom) {
                currentId = $(this).attr('id');
            }
        });

        $navTargets.removeClass('text-primary').addClass('text-heading/80');
        if (currentId) {
            $(`[data-nav-target="${currentId}"]`).removeClass('text-heading/80').addClass('text-primary');
        }
    }
    $(window).on('scroll', highlightActiveNav);
    highlightActiveNav();

    /* ---------------------------------------------------------
     * Reveal-on-scroll animations (fade up / left / right)
     * ------------------------------------------------------- */
    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15 }
    );
    document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

    /* ---------------------------------------------------------
     * Counter animation (hero stats)
     * ------------------------------------------------------- */
    function animateCounter($el) {
        const target = parseInt($el.attr('data-count'), 10);
        $({ value: 0 }).animate(
            { value: target },
            {
                duration: 1400,
                easing: 'swing',
                step(now) {
                    $el.text(Math.floor(now));
                },
                complete() {
                    $el.text(target);
                },
            }
        );
    }

    const counterObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter($(entry.target));
                    counterObserver.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );
    document.querySelectorAll('.counter').forEach((el) => counterObserver.observe(el));

    /* ---------------------------------------------------------
     * Skill progress bar + percentage animation
     * ------------------------------------------------------- */
    const skillObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                const $wrapper = $(entry.target).closest('.reveal');
                const $bar = $wrapper.find('.skill-bar-fill');
                const $percent = $wrapper.find('.skill-percent');
                const width = $bar.attr('data-width');
                const target = parseInt($percent.attr('data-target'), 10);

                $bar.css('width', width + '%');
                $({ value: 0 }).animate(
                    { value: target },
                    {
                        duration: 1200,
                        step(now) {
                            $percent.text(Math.floor(now) + '%');
                        },
                        complete() {
                            $percent.text(target + '%');
                        },
                    }
                );
                skillObserver.unobserve(entry.target);
            });
        },
        { threshold: 0.4 }
    );
    document.querySelectorAll('.skill-bar-fill').forEach((el) => skillObserver.observe(el));

    /* ---------------------------------------------------------
     * About: tab switching (Education / Bio / Contact)
     * ------------------------------------------------------- */
    $('.about-tab-btn').on('click', function () {
        const tab = $(this).data('tab');

        $('.about-tab-btn')
            .removeClass('border-orange-500 text-orange-500')
            .addClass('border-transparent text-slate-500');

        $(this).removeClass('border-transparent text-slate-500').addClass('border-orange-500 text-orange-500');

        $('.about-tab-panel').addClass('hidden');
        $(`.about-tab-panel[data-panel="${tab}"]`).removeClass('hidden');

        if (tab === 'contact') {
            $('.about-slider-col').addClass('hidden');
            $('.about-left-col').addClass('lg:col-span-2');
        } else {
            $('.about-slider-col').removeClass('hidden');
            $('.about-left-col').removeClass('lg:col-span-2');
        }

        const $content = $('#about-tab-content');
        $content.removeClass('animate-fade-in');
        void $content[0].offsetWidth;
        $content.addClass('animate-fade-in');
    });

    /* ---------------------------------------------------------
     * About: image slider
     * ------------------------------------------------------- */
    const $slides = $('.about-slide');
    const $dots = $('.about-slider-dot');
    let currentSlide = 0;
    let sliderTimer = null;

    function goToSlide(index) {
        const total = $slides.length;
        currentSlide = (index + total) % total;

        $slides.removeClass('opacity-100').addClass('opacity-0');
        $slides.eq(currentSlide).removeClass('opacity-0').addClass('opacity-100');

        $dots.removeClass('bg-orange-500 scale-110').addClass('bg-white/60');
        $dots.eq(currentSlide).removeClass('bg-white/60').addClass('bg-orange-500 scale-110');
    }

    function startAutoSlide() {
        clearInterval(sliderTimer);
        sliderTimer = setInterval(() => goToSlide(currentSlide + 1), 5000);
    }

    if ($slides.length) {
        $dots.on('click', function () { goToSlide($(this).data('slide')); startAutoSlide(); });
        startAutoSlide();
    }

    /* ---------------------------------------------------------
     * Portfolio filter (jQuery, no page reload)
     * ------------------------------------------------------- */
    $('.portfolio-filter-btn').on('click', function () {
        const filter = $(this).data('filter');

        $('.portfolio-filter-btn')
            .removeClass('bg-primary text-white shadow-lg shadow-orange-500/25')
            .addClass('bg-heading/5 text-heading');
        $(this)
            .removeClass('bg-heading/5 text-heading')
            .addClass('bg-primary text-white shadow-lg shadow-orange-500/25');

        $('.portfolio-item').each(function () {
            const categories = $(this).data('category').toString().split(' ');
            const show = filter === 'all' || categories.includes(filter);
            $(this).toggleClass('hidden', !show);
        });
    });

    /* ---------------------------------------------------------
     * Gallery lightbox
     * ------------------------------------------------------- */
    const $lightbox = $('#lightbox');

    $('.gallery-item').on('click', function () {
        const title = $(this).data('title');
        const src = $(this).data('src');

        $('#lightbox-title').text(title);
        $('#lightbox-img').attr('src', src).attr('alt', title);
        $lightbox.removeClass('hidden').addClass('flex');
        $('body').css('overflow', 'hidden');
    });

    function closeLightbox() {
        $lightbox.addClass('hidden').removeClass('flex');
        $('body').css('overflow', '');
    }
    $('#lightbox-close').on('click', closeLightbox);
    $lightbox.on('click', function (e) {
        if (e.target === this) closeLightbox();
    });
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape') closeLightbox();
    });

    /* ---------------------------------------------------------
     * Back to top button
     * ------------------------------------------------------- */
    const $backToTop = $('#back-to-top');

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 400) {
            $backToTop.removeClass('opacity-0 translate-y-4 pointer-events-none').addClass('opacity-100 translate-y-0');
        } else {
            $backToTop.addClass('opacity-0 translate-y-4 pointer-events-none').removeClass('opacity-100 translate-y-0');
        }
    });

    $backToTop.on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 600);
    });

    /* ---------------------------------------------------------
     * Footer current year
     * ------------------------------------------------------- */
    $('#current-year').text(new Date().getFullYear());

    /* ---------------------------------------------------------
     * Smooth scroll for in-page anchor links (with header offset)
     * ------------------------------------------------------- */
    $('a[href^="#"]').on('click', function (e) {
        const targetId = $(this).attr('href');
        if (targetId.length < 2) return;
        const $target = $(targetId);
        if (!$target.length) return;

        e.preventDefault();
        $('html, body').animate({ scrollTop: $target.offset().top - 90 }, 600);
    });
});
