             <script>
            var param=0;
            //var f = ['🌑', '🌒', '🌓', '🌔', '🌕', '🌖', '🌗', '🌘'];
            var f_moon = ['🌑', '🌒', '🌓', '🌔', '🌝', '🌖', '🌗', '🌘'];

            function loop_moon() {
                if(param>0)
                  clearTimeout(param);
                location.hash = f_moon[Math.floor((Date.now()/100)%f_moon.length)];

                param=setTimeout(loop_moon, 50);
            }
            var f_clock = [], i;

            for (i = 0; i < 12; i ++) {
                f_clock.push(String.fromCodePoint(0x1F550 + i));
                //f.push(String.fromCodePoint(0x1F550 + i + 12)); // half hours
            }

            function loop_clock() {
                if(param>0)
                  clearTimeout(param);
                location.hash = f_clock[Math.floor((Date.now()/100)%f_clock.length)];

                param=setTimeout(loop_clock, 50);
            }

              function loop_smile() {
                if(param>0)
                  clearTimeout(param);
                var s = '',
                    e = ['☺', '😚', '😘'],
                    i, m;

                for (i = 0; i < 10; i ++) {
                    m = Math.floor(e.length * ((Math.sin((Date.now()/200) + i)+1)/2));
                    s += e[m];
                }

                location.hash = s;

                param=setTimeout(loop_smile, 50);
            }
              function loop_wave() {
                if(param>0)
                  clearTimeout(param);
                var i, n, s = '';

                for (i = 0; i < 10; i++) {
                    n = Math.floor(Math.sin((Date.now()/200) + (i/2)) * 4) + 4;

                    s += String.fromCharCode(0x2581 + n);
                }

                window.location.hash = s;

                param=setTimeout(loop_wave, 50);
            }
             function loop_baby() {
                if(param>0)
                  clearTimeout(param);
                var s = '',
                    e = ['🏻', '🏼', '🏽', '🏾', '🏿'],
                    i, m;

                for (i = 0; i < 10; i ++) {
                    m = Math.floor(e.length * ((Math.sin((Date.now()/100) + i)+1)/2));
                    s += '👶' + e[m];
                }

                location.hash = s;

                param=setTimeout(loop_baby, 50);
            }

            function loop_progress() {
                if(param>0)
                  clearTimeout(param);
                var s = '',
                    p;

                p = Math.floor(((Math.sin(Date.now()/300)+1)/2) * 100);

                while (p >= 8) {
                    s += '█';
                    p -= 8;
                }
                s += ['▁','▏','▎','▍','▌','▋','▊','▉'][p];

                while (s.length < 100/8) {
                    s += '▁';
                }

                location.hash = s;
                param=setTimeout(loop_progress, 50);
            }

            window.addEventListener('load', function () {
                <!--cartoon-motion--!>;
            });
            /*window.addEventListener('load', function () {
                loop();
            });*/
            </script>

