!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):e(window.jQuery)}(function(i){"use strict";var a=0;i.ajaxTransport("iframe",function(r){var o,p;if(r.async&&("POST"===r.type||"GET"===r.type))return{send:function(e,t){(o=i('<form style="display:none;"></form>')).attr("accept-charset",r.formAcceptCharset),p=i('<iframe src="javascript:false;" name="iframe-transport-'+(a+=1)+'"></iframe>').bind("load",function(){var n,a=i.isArray(r.paramName)?r.paramName:[r.paramName];p.unbind("load").bind("load",function(){var a;try{if(!(a=p.contents()).length||!a[0].firstChild)throw new Error}catch(e){a=void 0}t(200,"success",{iframe:a}),i('<iframe src="javascript:false;"></iframe>').appendTo(o),o.remove()}),o.prop("target",p.prop("name")).prop("action",r.url).prop("method",r.type),r.formData&&i.each(r.formData,function(e,a){i('<input type="hidden"/>').prop("name",a.name).val(a.value).appendTo(o)}),r.fileInput&&r.fileInput.length&&"POST"===r.type&&(n=r.fileInput.clone(),r.fileInput.after(function(e){return n[e]}),r.paramName&&r.fileInput.each(function(e){i(this).prop("name",a[e]||r.paramName)}),o.append(r.fileInput).prop("enctype","multipart/form-data").prop("encoding","multipart/form-data")),o.submit(),n&&n.length&&r.fileInput.each(function(e,a){var t=i(n[e]);i(a).prop("name",t.prop("name")),t.replaceWith(a)})}),o.append(p).appendTo(document.body)},abort:function(){p&&p.unbind("load").prop("src","javascript".concat(":false;")),o&&o.remove()}}}),i.ajaxSetup({converters:{"iframe text":function(e){return i(e[0].body).text()},"iframe json":function(e){return i.parseJSON(i(e[0].body).text())},"iframe html":function(e){return i(e[0].body).html()},"iframe script":function(e){return i.globalEval(i(e[0].body).text())}}})});