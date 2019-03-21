<?php
/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */

/*
 * @ PHP 5.6
 * @ Decoder version : 1.0.0.1
 * @ Release on : 24.03.2018
 * @ Website    : http://EasyToYou.eu
 */
echo "<!DOCTYPE html>\n<html>\n  <head>\n    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\"></script>\n    <script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>\n    <link rel=\"stylesheet\" media=\"screen\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600\" />\n    <link rel=\"stylesheet\" media=\"screen\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" />\n\n\n    <style>\n     * {\n         -moz-box-sizing:border-box;\n         -webkit-box-sizing:border-box;\n         box-sizing:border-box;\n     }\n\n     html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre,\n     abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp,\n     small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li,\n     fieldset, form, label, legend, caption, article, aside, canvas, details, figcaption, figure,  footer, header, hgroup,\n     menu, nav, section, summary, time, mark, audio, video {\n         margin:0;\n         padding:0;\n         border:0;\n         outline:0;\n         vertical-align:baseline;\n         background:transparent;\n     }\n\n     article, aside, details, figcaption, figure, footer, header, hgroup, nav, section {\n         display: block;\n     }\n\n     html {\n         font-size: 16px;\n         line-height: 24px;\n         width:100%;\n         height:100%;\n         -webkit-text-size-adjust: 100%;\n         -ms-text-size-adjust: 100%;\n         overflow-y:scroll;\n         overflow-x:hidden;\n     }\n\n     img {\n         vertical-align:middle;\n         max-width: 100%;\n         height: auto;\n         border: 0;\n         -ms-interpolation-mode: bicubic;\n     }\n\n     body {\n         min-height:100%;\n         -webkit-font-smoothing: subpixel-antialiased;\n     }\n\n     .clearfix {\n\t       clear:both;\n\t       zoom: 1;\n     }\n     .clearfix:before, .clearfix:after {\n         content: \"\\0020\";\n         display: block;\n         height: 0;\n         visibility: hidden;\n     } \n     .clearfix:after {\n         clear: both;\n     }\n    </style>\n    <style>\n  .plain.error-page-wrapper {\n    font-family: 'Source Sans Pro', sans-serif;\n    background-color:#6355bc;\n    padding:0 5%;\n    position:relative;\n  }\n\n  .plain.error-page-wrapper .content-container {\n    -webkit-transition: left .5s ease-out, opacity .5s ease-out;\n    -moz-transition: left .5s ease-out, opacity .5s ease-out;\n    -ms-transition: left .5s ease-out, opacity .5s ease-out;\n    -o-transition: left .5s ease-out, opacity .5s ease-out;\n    transition: left .5s ease-out, opacity .5s ease-out;\n    max-width:400px;\n    position:relative;\n    left:-30px;\n    opacity:0;\n  }\n\n  .plain.error-page-wrapper .content-container.in {\n    left: 0px;\n    opacity:1;\n  }\n\n  .plain.error-page-wrapper .head-line {\n    transition: color .2s linear;\n    font-size:48px;\n    line-height:60px;\n    color:rgba(255,255,255,.2);\n    letter-spacing: -1px;\n    margin-bottom: 5px;\n  }\n  .plain.error-page-wrapper .subheader {\n    transition: color .2s linear;\n    font-size:36px;\n    line-height:46px;\n    color:#fff;\n  }\n  .plain.error-page-wrapper hr {\n    height:1px;\n    background-color: rgba(255,255,255,.2);\n    border:none;\n    width:250px;\n    margin:35px 0;\n  }\n  .plain.error-page-wrapper .context {\n    transition: color .2s linear;\n    font-size:18px;\n    line-height:27px;\n    color:#fff;\n  }\n  .plain.error-page-wrapper .context p {\n    margin:0;\n  }\n  .plain.error-page-wrapper .context p:nth-child(n+2) {\n    margin-top:12px;\n  }\n  .plain.error-page-wrapper .buttons-container {\n    margin-top: 45px;\n    overflow: hidden;\n  }\n  .plain.error-page-wrapper .buttons-container a {\n    transition: color .2s linear, border-color .2s linear;\n    font-size:14px;\n    text-transform: uppercase;\n    text-decoration: none;\n    color:#fff;\n    border:2px solid white;\n    border-radius: 99px;\n    padding:8px 30px 9px;\n    display: inline-block;\n    float:left;\n  }\n  .plain.error-page-wrapper .buttons-container a:hover {\n    background-color:rgba(255,255,255,.05);\n  }\n  .plain.error-page-wrapper .buttons-container a:first-child {\n    margin-right:25px;\n  }\n\n  @media screen and (max-width: 485px) {\n    .plain.error-page-wrapper .header {\n      font-size:36px;\n     }\n    .plain.error-page-wrapper .subheader {\n      font-size:27px;\n      line-height:38px;\n     }\n    .plain.error-page-wrapper hr {\n      width:185px;\n      margin:25px 0;\n     }\n\n    .plain.error-page-wrapper .context {\n      font-size:16px;\n      line-height: 24px;\n     }\n    .plain.error-page-wrapper .buttons-container {\n      margin-top:35px;\n    }\n\n    .plain.error-page-wrapper .buttons-container a {\n      font-size:13px;\n      padding:8px 0 7px;\n      width:45%;\n      text-align: center;\n    }\n    .plain.error-page-wrapper .buttons-container a:first-child {\n      margin-right:10%;\n    }\n  }\n</style>\n\n    <style>\n\n    .background-color {\n      background-color: #6355BC !important;\n    }\n\n\n    .primary-text-color {\n      color: #FFFFFF !important;\n    }\n\n    .secondary-text-color {\n      color: #8277c9 !important;\n    }\n\n\n\n\n    .border-button {\n      color: #FFFFFF !important;\n      border-color: #FFFFFF !important;\n    }\n    .button {\n      background-color: #FFFFFF !important;\n      color:  !important;\n    }\n\n\n</style>\n\n  </head>\n  <body class=\"plain error-page-wrapper background-color background-image\">\n    <div class=\"content-container\">\n\t<div class=\"head-line secondary-text-color\">\n\t\t404\n\t</div>\n\t<div class=\"subheader primary-text-color\">\n\t\tOops, the page you're <br>\n\t\tlooking for does not exist.\n\t</div>\n\t<hr>\n\t<div class=\"clearfix\"></div>\n\t<div class=\"context primary-text-color\">\n\t\t<!-- doesn't use context_content because it's ALWAYS the same thing -->\n    <p>\n      You may want to head back to the homepage.<br />\n      If you think something is broken, report a problem.\n    </p>\n\t</div>\n\t<div class=\"buttons-container\">\n\t\t<a class=\"border-button\" href=\"https://www.dbface.com\" target=\"_blank\">Go To Homepage</a>\n\t\t<a class=\"border-button\" href=\"mailto:support@dbface.com\" target=\"_blank\">Report A Problem</a>\n\t</div>\n</div>\n\n\n    <script>\n     function ErrorPage(container, pageType, templateName) {\n       this.\$container = \$(container);\n       this.\$contentContainer = this.\$container.find(templateName == 'sign' ? '.sign-container' : '.content-container');\n       this.pageType = pageType;\n       this.templateName = templateName;\n     }\n\n     ErrorPage.prototype.centerContent = function () {\n       var containerHeight = this.\$container.outerHeight()\n         , contentContainerHeight = this.\$contentContainer.outerHeight()\n         , top = (containerHeight - contentContainerHeight) / 2\n         , offset = this.templateName == 'sign' ? -100 : 0;\n\n       this.\$contentContainer.css('top', top + offset);\n     };\n\n     ErrorPage.prototype.initialize = function () {\n       var self = this;\n\n       this.centerContent();\n       this.\$container.on('resize', function (e) {\n         e.preventDefault();\n         e.stopPropagation();\n         self.centerContent();\n       });\n\n       // fades in content on the plain template\n       if (this.templateName == 'plain') {\n         window.setTimeout(function () {\n           self.\$contentContainer.addClass('in');\n         }, 500);\n       }\n\n       // swings sign in on the sign template\n       if (this.templateName == 'sign') {\n         \$('.sign-container').animate({textIndent : 0}, {\n           step : function (now) {\n             \$(this).css({\n               transform : 'rotate(' + now + 'deg)',\n               'transform-origin' : 'top center'\n             });\n           },\n           duration : 1000,\n           easing : 'easeOutBounce'\n         });\n       }\n     };\n\n\n     ErrorPage.prototype.createTimeRangeTag = function(start, end) {\n       return (\n         '<time utime=' + start + ' simple_format=\"MMM DD, YYYY HH:mm\">' + start + '</time> - <time utime=' + end + ' simple_format=\"MMM DD, YYYY HH:mm\">' + end + '</time>.'\n       )\n     };\n\n\n     ErrorPage.prototype.handleStatusFetchSuccess = function (pageType, data) {\n       if (pageType == '503') {\n         \$('#replace-with-fetched-data').html(data.status.description);\n       } else {\n         if (!!data.scheduled_maintenances.length) {\n           var maint = data.scheduled_maintenances[0];\n           \$('#replace-with-fetched-data').html(this.createTimeRangeTag(maint.scheduled_for, maint.scheduled_until));\n           \$.fn.localizeTime();\n         }\n         else {\n           \$('#replace-with-fetched-data').html('<em>(there are no active scheduled maintenances)</em>');\n         }\n       }\n     };\n\n\n     ErrorPage.prototype.handleStatusFetchFail = function (pageType) {\n       \$('#replace-with-fetched-data').html('<em>(enter a valid Statuspage url)</em>');\n     };\n\n\n     ErrorPage.prototype.fetchStatus = function (pageUrl, pageType) {\n       //console.log('in app.js fetch');\n       if (!pageUrl || !pageType || pageType == '404') return;\n\n       var url = ''\n         , self = this;\n\n       if (pageType == '503') {\n         url = pageUrl + '/api/v2/status.json';\n       }\n       else {\n         url = pageUrl + '/api/v2/scheduled-maintenances/active.json';\n       }\n\n       \$.ajax({\n         type : \"GET\",\n         url : url,\n       }).success(function (data, status) {\n         //console.log('success');\n         self.handleStatusFetchSuccess(pageType, data);\n       }).fail(function (xhr, msg) {\n         //console.log('fail');\n         self.handleStatusFetchFail(pageType);\n       });\n\n     };\n     var ep = new ErrorPage('body', \"404\", \"plain\");\n     ep.initialize();\n\n     // hack to make sure content stays centered >_<\n     \$(window).on('resize', function() {\n       \$('body').trigger('resize')\n     });\n\n    </script>\n\n    \n  </body>\n</html>\n";

?>