!function(e,c){var p=e.codiad;c(window).load(function(){p.filemanager.init()}),p.filemanager={clipboard:"",noOpen:["jpg","jpeg","png","gif","bmp","exe","zip","tar","tar.gz"],noBrowser:["jpg","jpeg","png","gif","bmp"],controller:"components/filemanager/controller.php",dialog:"components/filemanager/dialog.php",dialogUpload:"components/filemanager/dialog_upload.php",init:function(){this.nodeListener(),c.loadScript("components/filemanager/upload_scripts/jquery.ui.widget.js",!0),c.loadScript("components/filemanager/upload_scripts/jquery.iframe-transport.js",!0),c.loadScript("components/filemanager/upload_scripts/jquery.fileupload.js",!0)},nodeListener:function(){var t=this;c("#file-manager").on("selectstart",!1),c("#file-manager span").live("click",function(){"directory"==c(this).parent().children("a").attr("data-type")?t.index(c(this).parent().children("a").attr("data-path")):t.openFile(c(this).parent().children("a").attr("data-path")),c(this).hasClass("none")||(c(this).hasClass("plus")?(c(this).removeClass("plus"),c(this).addClass("minus")):(c(this).removeClass("minus"),c(this).addClass("plus")))}),c("#file-manager a").live("dblclick",function(){p.editor.settings.fileManagerTrigger||(c(this).hasClass("directory")?t.index(c(this).attr("data-path")):t.openFile(c(this).attr("data-path")),c(this).parent().children("span").hasClass("none")||(c(this).parent().children("span").hasClass("plus")?(c(this).parent().children("span").removeClass("plus"),c(this).parent().children("span").addClass("minus")):(c(this).parent().children("span").removeClass("minus"),c(this).parent().children("span").addClass("plus"))))}).live("click",function(){p.editor.settings.fileManagerTrigger&&(c(this).hasClass("directory")?t.index(c(this).attr("data-path")):t.openFile(c(this).attr("data-path")),c(this).parent().children("span").hasClass("none")||(c(this).parent().children("span").hasClass("plus")?(c(this).parent().children("span").removeClass("plus"),c(this).parent().children("span").addClass("minus")):(c(this).parent().children("span").removeClass("minus"),c(this).parent().children("span").addClass("plus"))))}).live("contextmenu",function(e){e.preventDefault(),t.contextMenuShow(e,c(this).attr("data-path"),c(this).attr("data-type"),c(this).html()),c(this).addClass("context-menu-active")})},contextMenuShow:function(e,t,a,n){var o=this;switch(a){case"directory":c("#context-menu .directory-only, #context-menu .non-root").show(),c("#context-menu .file-only, #context-menu .root-only").hide();break;case"file":c("#context-menu .directory-only, #context-menu .root-only").hide(),c("#context-menu .file-only,#context-menu .non-root").show();break;case"root":c("#context-menu .directory-only, #context-menu .root-only").show(),c("#context-menu .non-root, #context-menu .file-only").hide()}p.project.isAbsPath(c('#file-manager a[data-type="root"]').attr("data-path"))?c("#context-menu .no-external").hide():c("#context-menu .no-external").show();var s=e.pageY;s>c(window).height()-c("#context-menu").height()&&(s-=c("#context-menu").height()),s<10&&(s=10);var i=c(window).height()-s-10;c("#context-menu").css({top:s+"px",left:e.pageX+"px","max-height":i+"px"}).fadeIn(200).attr("data-path",t).attr("data-type",a).attr("data-name",n),""===this.clipboard?c('#context-menu a[content="Paste"]').addClass("disabled"):c('#context-menu a[data-action="paste"]').removeClass("disabled"),c("#file-manager, #editor-region").on("mouseover",function(){o.contextMenuHide()}),amplify.publish("context-menu.onShow",{e:e,path:t,type:a}),c("#context-menu a").click(function(){o.contextMenuHide()})},contextMenuHide:function(){c("#context-menu").fadeOut(200),c("#file-manager a").removeClass("context-menu-active"),amplify.publish("context-menu.onHide")},getShortName:function(e){return e.split("/").pop()},getExtension:function(e){return e.split(".").pop()},getType:function(e){return c('#file-manager a[data-path="'+e+'"]').attr("data-type")},createObject:function(e,t,a){var n=c('#file-manager a[data-path="'+e+'"]');if(!c('#file-manager a[data-path="'+t+'"]').length)if(n.hasClass("open")&&n.hasClass("directory")){var o=this.getShortName(t);if("directory"==a)var s='<li><span class="none"></span><a class="directory" data-type="directory" data-path="'+t+'">'+o+"</a></li>";else s='<li><span class="none"></span><a class="file ext-'+this.getExtension(o)+'" data-type="file" data-path="'+t+'">'+o+"</a></li>";n.siblings("ul").length?n.siblings("ul").append(s):c("<ul>"+s+"</ul>").insertAfter(n)}else n.parent().children("span").removeClass("none"),n.parent().children("span").addClass("plus")},indexFiles:[],index:function(i,n){var r=this;void 0===n&&(n=!1),node=c('#file-manager a[data-path="'+i+'"]'),console.log("node type: "+node.attr("data-type")),node.hasClass("open")&&!n?node.parent("li").children("ul").slideUp(300,function(){c(this).remove(),node.removeClass("open")}):(node.addClass("loading"),c.get(this.controller+"?action=index&path="+encodeURIComponent(i),function(e){node.addClass("open");var t=p.jsend.parse(e);if("error"!=t){r.indexFiles=t.index,console.log("path: "+i),amplify.publish("filemanager.onIndex",{path:i,files:r.indexFiles});var o=r.indexFiles;if(0<o.length){node.parent().children("span").hasClass("plus")&&node.parent().children("span").removeClass("plus").addClass("minus");var a="display:none;";n&&(a="");var s='<ul style="'+a+'">';c.each(o,function(e){var t="",a=o[e].name.replace(i,""),n="none";if(a=a.split("/").join(" "),"file"==o[e].type)t=" ext-"+a.split(".").pop();"directory"==o[e].type&&0<o[e].size&&(n="plus"),s+='<li><span class="'+n+'"></span><a class="'+o[e].type+t+'" data-type="'+o[e].type+'" data-path="'+o[e].name+'">'+a+"</a></li>"}),s+="</ul>",n&&node.parent("li").children("ul").remove(),c(s).insertAfter(node),n||node.siblings("ul").slideDown(300)}}node.removeClass("loading"),n&&r.rescanChildren.length>r.rescanCounter?r.rescan(r.rescanChildren[r.rescanCounter++]):(r.rescanChildren=[],r.rescanCounter=0)}))},rescanChildren:[],rescanCounter:0,rescan:function(e){var t=this;0===this.rescanCounter&&(node=c('#file-manager a[data-path="'+e+'"]'),node.parent().find("a.open").each(function(){t.rescanChildren.push(c(this).attr("data-path"))})),this.index(e,!0)},openFile:function(a,n){void 0===n&&(n=!0);var o=c('#file-manager a[data-path="'+a+'"]'),e=this.getExtension(a);c.inArray(e.toLowerCase(),this.noOpen)<0?(o.addClass("loading"),c.get(this.controller+"?action=open&path="+encodeURIComponent(a),function(e){var t=p.jsend.parse(e);"error"!=t&&(o.removeClass("loading"),p.active.open(a,t.content,t.mtime,!1,n))})):c.inArray(e.toLowerCase(),this.noBrowser)<0?this.download(a):this.openInModal(a)},openInBrowser:function(e){c.ajax({url:this.controller+"?action=open_in_browser&path="+encodeURIComponent(e),success:function(e){var t=p.jsend.parse(e);"error"!=t&&window.open(t.url,"_newtab")},async:!1})},openInModal:function(e){p.modal.load(250,this.dialog,{action:"preview",path:this.controller+"?action=open_in_browser&path="+encodeURIComponent(e)})},saveModifications:function(n,t,o){o=o||{};var s=this;c.post(this.controller+"?action=modify&path="+encodeURIComponent(n),t,function(e){if("success"==(e=c.parseJSON(e)).status){if(p.message.success(i18n("File saved")),"function"==typeof o.success){var t=o.context||s;o.success.call(t,e.data.mtime)}}else{if("Client is out of sync"==e.message)if(confirm("Server has a more updated copy of the file. Would you like to refresh the contents ? Pressing no will cause your changes to override the server's copy upon next save."))p.active.close(n),p.active.removeDraft(n),s.openFile(n);else{var a=p.editor.getActive().getSession();a.serverMTime=null,a.untainted=null}else p.message.error(i18n("File could not be saved"));if("function"==typeof o.error){t=o.context||s;o.error.apply(t,[e.data])}}}).error(function(){if(p.message.error(i18n("File could not be saved")),"function"==typeof o.error){var e=o.context||s;o.error.apply(e,[t])}})},saveFile:function(e,t,a){this.saveModifications(e,{content:t},a)},savePatch:function(e,t,a,n){if(0<t.length)this.saveModifications(e,{patch:t,mtime:a},n);else if("function"==typeof n.success){var o=n.context||this;n.success.call(o,a)}},createNode:function(e,t){p.modal.load(250,this.dialog,{action:"create",type:t,path:e}),c("#modal-content form").live("submit",function(e){e.preventDefault();var t=c('#modal-content form input[name="object_name"]').val(),a=c('#modal-content form input[name="path"]').val(),n=c('#modal-content form input[name="type"]').val(),o=a+"/"+t;c.get(p.filemanager.controller+"?action=create&path="+encodeURIComponent(o)+"&type="+n,function(e){"error"!=p.jsend.parse(e)&&(p.message.success(n.charAt(0).toUpperCase()+n.slice(1)+" Created"),p.modal.unload(),p.filemanager.createObject(a,o,n),"file"==n&&p.filemanager.openFile(o,!0),amplify.publish("filemanager.onCreate",{createPath:o,path:a,shortName:t,type:n}))})})},copyNode:function(e){this.clipboard=e,p.message.success(i18n("Copied to Clipboard"))},pasteNode:function(a){var n=this;if(""==this.clipboard)p.message.error(i18n("Nothing in Your Clipboard"));else if(a==this.clipboard)p.message.error(i18n("Cannot Paste Directory Into Itself"));else{var e=n.getShortName(n.clipboard);c('#file-manager a[data-path="'+a+"/"+e+'"]').length?(p.modal.load(400,this.dialog,{action:"overwrite",path:a+"/"+e}),c("#modal-content form").live("submit",function(e){e.preventDefault();var t=!1;1==c('#modal-content form select[name="or_action"]').val()&&(t=!0,console.log("Dup!")),n.processPasteNode(a,t)})):n.processPasteNode(a,!1)}},processPasteNode:function(t,a){var n=this,o=this.getShortName(this.clipboard),s=this.getType(this.clipboard);a&&(o="copy_of_"+o),c.get(this.controller+"?action=duplicate&path="+encodeURIComponent(this.clipboard)+"&destination="+encodeURIComponent(t+"/"+o),function(e){"error"!=p.jsend.parse(e)&&(n.createObject(t,t+"/"+o,s),p.modal.unload(),amplify.publish("filemanager.onPaste",{path:t,shortName:o,duplicate:a}))})},renameNode:function(s){var e=this.getShortName(s),r=this.getType(s),l=this;p.modal.load(250,this.dialog,{action:"rename",path:s,short_name:e,type:r}),c("#modal-content form").live("submit",function(e){e.preventDefault();var t=c('#modal-content form input[name="object_name"]').val(),a=s.split("/"),n=new Array;for(i=0;i<a.length-1;i++)n.push(a[i]);var o=n.join("/")+"/"+t;c.get(l.controller,{action:"modify",path:s,new_name:t},function(e){"error"!=p.jsend.parse(e)&&(p.message.success(r.charAt(0).toUpperCase()+r.slice(1)+" Renamed"),c('#file-manager a[data-path="'+s+'"]').attr("data-path",o).html(t),"file"==r?(curExtClass="ext-"+l.getExtension(s),newExtClass="ext-"+l.getExtension(o),c('#file-manager a[data-path="'+o+'"]').removeClass(curExtClass).addClass(newExtClass)):l.repathSubs(s,o),p.active.rename(s,o),p.modal.unload())})})},repathSubs:function(t,a){c('#file-manager a[data-path="'+a+'"]').siblings("ul").find("a").each(function(){var e=c(this).attr("data-path").replace(t,a);c(this).attr("data-path",e)})},deleteNode:function(t){var a=this;p.modal.load(400,this.dialog,{action:"delete",path:t}),c("#modal-content form").live("submit",function(e){e.preventDefault(),c.get(a.controller+"?action=delete&path="+encodeURIComponent(t),function(e){"error"!=p.jsend.parse(e)&&(c('#file-manager a[data-path="'+t+'"]').parent("li").remove(),c("#active-files a").each(function(){var e=c(this).attr("data-path");0==e.indexOf(t)&&p.active.remove(e)}));p.modal.unload()})})},search:function(t){p.modal.load(500,this.dialog,{action:"search",path:t}),p.modal.load_process.done(function(){var e=JSON.parse(localStorage.getItem("lastSearched"));e&&(c('#modal-content form input[name="search_string"]').val(e.searchText),c('#modal-content form input[name="search_file_type"]').val(e.fileExtension),c('#modal-content form select[name="search_type"]').val(e.searchType),""!=e.searchResults&&c("#filemanager-search-results").slideDown().html(e.searchResults))}),p.modal.hideOverlay();var n=this;c("#modal-content form").live("submit",function(e){c("#filemanager-search-processing").show(),e.preventDefault(),searchString=c('#modal-content form input[name="search_string"]').val(),fileExtensions=c('#modal-content form input[name="search_file_type"]').val(),searchFileType=c.trim(fileExtensions),""!=searchFileType&&(searchFileType="\\("+searchFileType.replace(/\s+/g,"\\|")+"\\)"),searchType=c('#modal-content form select[name="search_type"]').val(),c.post(n.controller+"?action=search&path="+encodeURIComponent(t)+"&type="+searchType,{search_string:searchString,search_file_type:searchFileType},function(e){searchResponse=p.jsend.parse(e);var a="";"error"!=searchResponse?(c.each(searchResponse.index,function(e,t){"/"==t.file.substr(-1)&&(t.file=t.file.substr(0,str.length-1)),t.file=t.file.replace("//","/"),a+="<div><a onclick=\"codiad.filemanager.openFile('"+t.result+"');setTimeout( function() { codiad.active.gotoLine("+t.line+'); }, 500);codiad.modal.unload();">Line '+t.line+": "+t.file+"</a></div>"}),c("#filemanager-search-results").slideDown().html(a)):c("#filemanager-search-results").slideUp(),n.saveSearchResults(searchString,searchType,fileExtensions,a),c("#filemanager-search-processing").hide()})})},saveSearchResults:function(e,t,a,n){var o={searchText:e,searchType:t,fileExtension:a,searchResults:n};localStorage.setItem("lastSearched",JSON.stringify(o))},uploadToNode:function(e){p.modal.load(500,this.dialogUpload,{path:e})},download:function(e){var t=this.getType(e);c("#download").attr("src","components/filemanager/download.php?path="+encodeURIComponent(e)+"&type="+t)}}}(this,jQuery);