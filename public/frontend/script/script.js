$(document).ready(function () {
    var opacity = document.getElementById('logo2');
    opacity.style.opacity = '1';
});

$(document).ready(function () {
    var opacity = document.getElementById('text-header');
    var opacity2 = document.getElementById('text-header2');
    opacity.style.opacity = '1';
    opacity2.style.opacity = '1';
});

$(document).ready(function () {
    $(window).scroll(function () {
        $('#sejarah').each(function () {
            var display = document.getElementById('sejarah');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                display.style.top = '-50px';
                $('#sejarah').animate({
                    'top': '0',
                    'opacity': '1'
                }, 1500);
                display.style.top = '0';
            }
        });
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        $('#carousel').each(function () {
            var display = document.getElementById('carousel');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                display.style.top = '-100px';
                $('#carousel').animate({
                    'top': '0',
                    'opacity': '1'
                }, 2000);
                display.style.top = '0';
            }
        });
    });
});

$(document).ready(function () {
    var button = document.getElementById('back-top');
    $(window).scroll(function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    });
});

$(document).ready(function () {
    var button = document.getElementById('comment');
    $(window).scroll(function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            button.style.display = "block";
        } else {
            button.style.display = "none";
        }
    });
});

$(document).ready(function () {
    $('#back-top').click(function () {
        $("#divisi, #pengurus, body, html").animate({
            scrollTop: 0
        }, "slow");
        return false;
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        $('#ketua').each(function () {
            var display = document.getElementById('ketua');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                display.style.left = '-100px';
                $('#ketua').animate({
                    'left': '0',
                    'opacity': '1'
                }, 1000);
                display.style.left = '0';
                return false;
            }
        });
        $('#wakil-ketua').each(function () {
            var display = document.getElementById('wakil-ketua');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.right = '-100px';
                    $('#wakil-ketua').animate({
                        'right': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.right = '0';
                }, 1000);
                return false;
            }
        });
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        $('#dpo1').each(function () {
            var display = document.getElementById('dpo1');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                display.style.left = '-100px';
                $('#dpo1').animate({
                    'left': '0',
                    'opacity': '1'
                }, 1000);
                display.style.left = '0';
                return false;
            }
        });
        $('#dpo2').each(function () {
            var display = document.getElementById('dpo2');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.top = '-50px';
                    $('#dpo2').animate({
                        'top': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.top = '0';
                }, 1000);
                return false;
            }
        });
        $('#dpo3').each(function () {
            var display = document.getElementById('dpo3');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.bottom = '-50px';
                    $('#dpo3').animate({
                        'bottom': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.bottom = '0';
                }, 1600);
                return false;
            }
        });
        $('#dpo4').each(function () {
            var display = document.getElementById('dpo4');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.top = '-50px';
                    $('#dpo4').animate({
                        'top': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.top = '0';
                }, 1300);
                return false;
            }
        });
        $('#dpo5').each(function () {
            var display = document.getElementById('dpo5');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.right = '-100px';
                    $('#dpo5').animate({
                        'right': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.right = '0';
                }, 700);
                return false;
            }
        });
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        $('#sekretaris').each(function () {
            var display = document.getElementById('sekretaris');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                display.style.left = '-100px';
                $('#sekretaris').animate({
                    'left': '0',
                    'opacity': '1'
                }, 1000);
                display.style.left = '0';
                return false;
            }
        });
        $('#bendahara').each(function () {
            var display = document.getElementById('bendahara');
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.right = '-100px';
                    $('#bendahara').animate({
                        'right': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.right = '0';
                }, 1000);
                return false;
            }
        });
    });
});

$(document).ready(function () {
    $(window).scroll(function () {
        $('#1').each(function () {
            var display = document.getElementById('1');
            display.style.opacity = '0';
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                display.style.left = '-100px';
                $('#1').animate({
                    'left': '0',
                    'opacity': '1'
                }, 1000);
                display.style.left = '0';
                return false;
            }
        });
        $('#2').each(function () {
            var display = document.getElementById('2');
            display.style.opacity = '0';
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.top = '-80px';
                    $('#2').animate({
                        'top': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.top = '0';
                }, 1000);
                return false;
            }
        });
        $('#3').each(function () {
            var display = document.getElementById('3');
            display.style.opacity = '0';
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.right = '-100px';
                    $('#3').animate({
                        'right': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.right = '0';
                }, 700);
                return false;
            }
        });
        $('#4').each(function () {
            var display = document.getElementById('4');
            display.style.opacity = '0';
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.left = '-100px';
                    $('#4').animate({
                        'left': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.left = '0';
                }, 700);
                return false;
            }
        });
        $('#5').each(function () {
            var display = document.getElementById('5');
            display.style.opacity = '0';
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                setTimeout(function () {
                    display.style.bottom = '-80px';
                    $('#5').animate({
                        'bottom': '0',
                        'opacity': '1'
                    }, 1000);
                    display.style.bottom = '0';
                }, 1000);
                return false;
            }
        });
        $('#6').each(function () {
            var display = document.getElementById('6');
            display.style.opacity = '0';
            var bottom_of_object = $(this).offset().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if (bottom_of_window > bottom_of_object) {
                display.style.right = '-100px';
                $('#6').animate({
                    'right': '0',
                    'opacity': '1'
                }, 1000);
                display.style.right = '0';
                return false;
            }
        });
    });
});