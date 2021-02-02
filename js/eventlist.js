(function(d, wd) {
                if (!window.$j) {
                    return;
                }
                $j(d).ready(function() {
                    var $cb_script = $j('script[src*="/js/chartbeat.js"]');
                    if ($cb_script.length) {
                        return;
                    }
                    wd.fifa = wd.fifa || {};
                    wd.fifa.analytics = wd.fifa.analytics || {};
                    wd.fifa.analytics.cbparams = wd.fifa.analytics.cbparams || {};
                    var _cbcfg = wd.fifa.analytics.cbparams;
                    _cbcfg.cbdomain = 'fifa.com';
                    var _sf_async_config = _sf_async_config || {};
                    var _cbcfg = wd.fifa.analytics.cbparams || {};
                    cbmanager = wd.fifa.analytics.manager(_cbcfg);
                    _sf_async_config.uid = cbmanager.Chartbeat.getUid();
                    _sf_async_config.domain = cbmanager.Chartbeat.getDomain();
                    _sf_async_config.authors = cbmanager.Chartbeat.getAuthors();
                    _sf_async_config.title = fifacom_s.prop8;
                    _sf_async_config.sections = fifacom_s.getHierarchy() + cbmanager.Chartbeat.getAddSections(true);
                    _sf_async_config.path = cbmanager.Chartbeat.getPath() + '?site=web' + window.location.hash;
                    _sf_async_config.useCanonical = true;

                    function loadChartbeat() {
                        window._sf_endpt = (new Date()).getTime();
                        var e = document.createElement("script");
                        e.setAttribute("language", "javascript");
                        e.setAttribute("type", "text/javascript");
                        e.setAttribute("src",
                            (("https:" == document.location.protocol) ?
                                "https://a248.e.akamai.net/chartbeat.download.akamai.com/102508/" :
                                "http://static.chartbeat.com/") +
                            "js/chartbeat.js");
                        document.body.appendChild(e);
                    }
                    var dont = new RegExp("(localhost|stg\.|dev\.|dynamic|static)");
                    if (!dont.test(window.location.href)) {
                        loadChartbeat();
                    }
                });
            }(document, window));