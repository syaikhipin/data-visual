!function(t,u){ace.require("ace/virtual_renderer").VirtualRenderer,ace.require("ace/editor").Editor;var s=ace.require("ace/edit_session").EditSession,n=ace.require("ace/undomanager").UndoManager,o={},i=t.codiad;i._cursorPoll=null;var l=3;u(function(){i.editor.init()});var a=new Array("abap","abc","actionscript","ada","apache_conf","applescript","asciidoc","assembly_x86","autohotkey","batchfile","c9search","c_cpp","cirru","clojure","cobol","coffee","coldfusion","csharp","css","curly","d","dart","diff","django","dockerfile","dot","eiffel","ejs","elixir","elm","erlang","forth","ftl","gcode","gherkin","gitignore","glsl","gobstones","golang","groovy","haml","handlebars","haskell","haxe","html","html_elixir","html_ruby","ini","io","jack","jade","java","javascript","json","jsoniq","jsp","jsx","julia","latex","lean","less","liquid","lisp","livescript","logiql","lsl","lua","luapage","lucene","makefile","markdown","mask","matlab","maze","mel","mips_assembler","mushcode","mysql","nix","nsis","objectivec","ocaml","pascal","perl","pgsql","php","plain_text","powershell","praat","prolog","protobuf","python","r","razor","rdoc","rhtml","rst","ruby","rust","sass","scad","scala","scheme","scss","sh","sjs","smarty","snippets","soy_template","space","sql","sqlserver","stylus","svg","swift","swig","tcl","tex","text","textile","toml","twig","typescript","vala","vbscript","velocity","verilog","vhdl","wollok","xml","xquery","yaml");function f(t,e,i){var r=this;this.root=t,this.splitType=i,this.childContainers={},this.childElements={},this.splitProp=.5,this.setChild(0,e[0]),this.setChild(1,e[1]),this.splitter=u("<div>").addClass("splitter").appendTo(t).draggable({axis:"horizontal"===i?"x":"y",drag:function(t,e){var i,s,n,o;"horizontal"===r.splitType?(i=e.position.left-l/2,s=r.root.width()-e.position.left-l/2,r.splitProp=i/r.root.width(),r.childElements[0].width(i).trigger("h-resize",[!0,!0]),r.childElements[1].width(s).css("left",i+l+"px").trigger("h-resize",[!0,!0]),r.splitProp=e.position.left/r.root.width()):(n=e.position.top-l/2,o=r.root.width()-e.position.top-l/2,r.splitProp=n/r.root.height(),r.childElements[0].height(n).trigger("v-resize",[!0,!0]),r.childElements[1].height(o).css("top",n+l+"px").trigger("v-resize",[!0,!0]))}}),"horizontal"===i?this.splitter.addClass("h-splitter").width(l).height(t.height()):"vertical"===i&&this.splitter.addClass("v-splitter").height(l).width(t.width()),this.root.on("h-resize",function(t,e,i){var s,n;if(t.stopPropagation(),"horizontal"===r.splitType)s=r.root.width()*r.splitProp-l/2,n=r.root.width()*(1-r.splitProp)-l/2,r.childElements[0].width(s),r.childElements[1].width(n).css("left",s+l),r.splitter.css("left",s);else if("vertical"===r.splitType){var o=r.root.width();r.childElements[0].width(o),r.childElements[1].width(o),r.splitter.width(o)}e&&r.root.parent(".editor-wrapper").trigger("h-resize",[!0,!1]),i&&(r.childContainers[0]?r.childContainers[0].root.trigger("h-resize",[!1,!0]):r.childContainers[1]&&r.childContainers[1].root.trigger("h-resize",[!1,!0]))}),this.root.on("v-resize",function(t,e,i){if(t.stopPropagation(),"horizontal"===r.splitType){var s=r.root.height();r.childElements[0].height(s),r.childElements[1].height(s),r.splitter.height(s)}else if("vertical"===r.splitType){var n=r.root.height()*r.splitProp-l/2,o=r.root.height()*(1-r.splitProp)-l/2;r.childElements[0].height(n),r.childElements[1].height(o).css("top",n+l),r.splitter.css("top",n)}e&&r.root.parent(".editor-wrapper").trigger("v-resize",[!0,!1]),i&&(r.childContainers[0]?r.childContainers[0].root.trigger("v-resize",[!1,!0]):r.childContainers[1]&&r.childContainers[1].root.trigger("v-resize",[!1,!0]))}),this.root.trigger("h-resize",[!1,!1]).trigger("v-resize",[!1,!1])}f.prototype={setChild:function(t,e){e instanceof f?(this.childElements[t]=e.root,(this.childContainers[t]=e).idx=t):this.childElements[t]=e,this.childElements[t].appendTo(this.root),this.cssInit(this.childElements[t],t)},cssInit:function(t,e){var i,s,n,o,r,a,c={};r=this.root.height(),a=this.root.width(),"horizontal"===this.splitType?(n=a*this.splitProp-l/2,o=a*(1-this.splitProp)-l/2,c=0===e?{left:0,width:n,height:r,top:0}:{left:n+l,width:o,height:r,top:0}):"vertical"===this.splitType&&(i=r*this.splitProp-l/2,s=r*(1-this.splitProp)-l/2,c=0===e?{top:0,height:i,width:a,left:0}:{top:i+l,height:s,width:a,left:0}),t.css(c)}},i.editor={instances:[],activeInstance:null,settings:{theme:"twilight",fontSize:"13px",printMargin:!1,printMarginColumn:80,highlightLine:!0,indentGuides:!0,wrapMode:!1,softTabs:!1,persistentModal:!0,rightSidebarTrigger:!1,fileManagerTrigger:!1,tabSize:4},rootContainer:null,fileExtensionTextMode:{},init:function(){this.createSplitMenu(),this.createModeMenu(),u("#editor-region").on("h-resize-init",function(){u("#editor-region > .editor-wrapper").width(u(this).width()).trigger("h-resize")}).on("v-resize-init",function(){u("#editor-region > .editor-wrapper").height(u(this).height()).trigger("v-resize")}),u(window).resize(function(){u("#editor-region").trigger("h-resize-init").trigger("v-resize-init")})},getSettings:function(){localStorage.getItem("codiad.editor.theme");var s=this;u.each(["theme","fontSize","tabSize"],function(t,e){var i=localStorage.getItem("codiad.editor."+e);null!==i&&(s.settings[e]=i)}),u.each(["printMargin","highlightLine","indentGuides","wrapMode","rightSidebarTrigger","fileManagerTrigger","softTabs","persistentModal"],function(t,e){var i=localStorage.getItem("codiad.editor."+e);null!==i&&(s.settings[e]="true"==i)}),u.each(["printMarginColumn"],function(t,e){var i=localStorage.getItem("codiad.editor."+e);null!==i&&(s.settings[e]=i)})},applySettings:function(t){this.getSettings(),t.setTheme("ace/theme/"+this.settings.theme),t.setFontSize(this.settings.fontSize),t.setPrintMarginColumn(this.settings.printMarginColumn),t.setShowPrintMargin(this.settings.printMargin),t.setHighlightActiveLine(this.settings.highlightLine),t.setDisplayIndentGuides(this.settings.indentGuides),t.getSession().setUseWrapMode(this.settings.wrapMode),this.setTabSize(this.settings.tabSize,t),this.setSoftTabs(this.settings.softTabs,t)},addInstance:function(t,e){var i,s=u('<div class="editor">'),n=[],o=null,r=null,a=this;if(0==this.instances.length)s.appendTo(u("#root-editor-wrapper"));else{var c=this.activeInstance.el;if(i="top"===e||"bottom"===e?"vertical":"horizontal",n[r="top"===e||"left"===e?0:1]=s,n[1-r]=c,o=new f(u('<div class="editor-wrapper">').height(c.height()).width(c.width()).addClass("editor-wrapper-"+i).appendTo(c.parent()),n,i),1<this.instances.length){var l=this.activeInstance.splitContainer,h=this.activeInstance.splitIdx;l.setChild(h,o)}}var d=ace.edit(s[0]),g=function(){d.resize()};if(o&&(d.splitContainer=o,d.splitIdx=r,this.activeInstance.splitContainer=o,this.activeInstance.splitIdx=1-r,o.root.on("h-resize",g).on("v-resize",g),1===this.instances.length)){var p=function(){a.instances[0].resize()};o.root.on("h-resize",p).on("v-resize",p)}return d.el=s,this.setSession(t,d),this.changeListener(d),this.cursorTracking(d),this.bindKeys(d),this.instances.push(d),d.on("focus",function(){a.focus(d)}),d},createSplitMenu:function(){var i=this,s=u("#split-options-menu");this.initMenuHandler(u("#split"),s),u("#split-horizontally a").click(function(t){t.stopPropagation(),i.addInstance(i.activeInstance.getSession(),"bottom"),s.hide()}),u("#split-vertically a").click(function(t){t.stopPropagation(),i.addInstance(i.activeInstance.getSession(),"right"),s.hide()}),u("#merge-all a").click(function(t){t.stopPropagation();var e=i.activeInstance.getSession();i.exterminate(),i.addInstance(e),s.hide()})},createModeMenu:function(){var n=this,o=u("#changemode-menu"),e=(new Array,new Array),t=0;this.initMenuHandler(u("#current-mode"),o),a.sort(),u.each(a,function(t){e.push("<li><a>"+a[t]+"</a></li>")});for(var i="<table><tr>";;){i+="<td><ul>",e.length-t<15?max=e.length:max=t+15;var s=e.slice(t,max);for(var r in s)i+=s[r];if(i+="</ul></td>",(t+=15)>=e.length)break}i+="</tr></table>",o.html(i),u("#changemode-menu a").click(function(t){t.stopPropagation();var e="ace/mode/"+u(t.currentTarget).text(),i=n.activeInstance.getSession(),s=function(){n.setModeDisplay(i),i.removeListener("changeMode",s)};i.on("changeMode",s),i.setMode(e),o.hide()})},initMenuHandler:function(t,e){var s=this,i=t,n=e;n.appendTo(u("body")),i.click(function(t){var e=u(window).height();t.stopPropagation(),s.closeMenus(n),n.css({bottom:e-u(this).offset().top+8+"px",left:u(this).offset().left-13+"px"}),n.slideToggle("fast");var i=function(){n.hide(),u(window).off("click",i)};u(window).on("click",i)})},closeMenus:function(t){var e=t.attr("id");"split-options-menu"!=e&&u("#split-options-menu").hide(),"changemode-menu"!=e&&u("#changemode-menu").hide()},setModeDisplay:function(t){var e=t.getMode().$id;e?(e=e.substring(e.lastIndexOf("/")+1),u("#current-mode").html(e)):u("#current-mode").html("text")},exterminate:function(){u(".editor").remove(),u(".editor-wrapper").remove(),u("#editor-region").append(u("<div>").attr("id","editor")),u("#current-file").html(""),u("#current-mode").html(""),this.instances=[],this.activeInstance=null},removeSession:function(t,e){for(var i=0;i<this.instances.length;i++)this.instances[i].getSession().path===t.path&&this.instances[i].setSession(e);u("#current-file").text()===t.path&&u("#current-file").text(e.path),this.setModeDisplay(e)},isOpen:function(t){for(var e=0;e<this.instances.length;e++)if(this.instances[e].getSession().path===t.path)return!0;return!1},forEach:function(t){for(var e=0;e<this.instances.length;e++)t.call(this,this.instances[e])},getActive:function(){return this.activeInstance},setActive:function(t){t&&(this.activeInstance=t,u("#current-file").text(t.getSession().path),this.setModeDisplay(t.getSession()))},setSession:function(t,e){if(e=e||this.getActive(),this.isOpen(t)){var i=new s(t.getDocument(),t.getMode());i.setUndoManager(new n),i.path=t.path,i.listThumb=t.listThumb,i.tabThumb=t.tabThumb,e?e.setSession(i):e=this.addInstance(i)}else e?e.setSession(t):e=this.addInstance(t);this.applySettings(e),this.setActive(e)},selectMode:function(t){return"string"!=typeof t?"text":(t=t.toLowerCase())in this.fileExtensionTextMode?this.fileExtensionTextMode[t]:"text"},addFileExtensionTextMode:function(t,e){"string"==typeof t&&"string"==typeof e?(e=e.toLowerCase(),this.fileExtensionTextMode[t]=e):console&&console.warn("wrong usage of addFileExtensionTextMode, both parameters need to be string")},clearFileExtensionTextMode:function(){this.fileExtensionTextMode={}},setMode:function(e,i){if(i=i||this.getActive(),o[e]){var t=ace.require("ace/mode/"+e).Mode;i.getSession().setMode(new t)}else{var s="https://assets.dbface.com/libs/ace/mode-"+e+".js";u.loadScript(s,function(){o[e]=!0;var t=ace.require("ace/mode/"+e).Mode;i.getSession().setMode(new t)},!0)}},setTheme:function(t,e){if(e)e.setTheme("ace/theme/"+t);else{this.settings.theme=t;for(var i=0;i<this.instances.length;i++)this.instances[i].setTheme("ace/theme/"+t)}localStorage.setItem("codiad.editor.theme",t)},setContent:function(t,e){(e=e||this.getActive()).getSession().setValue(t)},setFontSize:function(e,t){t?t.setFontSize(e):(this.settings.fontSize=e,this.forEach(function(t){t.setFontSize(e)})),localStorage.setItem("codiad.editor.fontSize",e)},setHighlightLine:function(e,t){t?t.setHighlightActiveLine(e):(this.settings.highlightLine=e,this.forEach(function(t){t.setHighlightActiveLine(e)})),localStorage.setItem("codiad.editor.highlightLine",e)},setPrintMargin:function(e,t){t?t.setShowPrintMargin(e):(this.settings.printMargin=e,this.forEach(function(t){t.setShowPrintMargin(e)})),localStorage.setItem("codiad.editor.printMargin",e)},setPrintMarginColumn:function(e,t){t?t.setPrintMarginColumn(e):(this.settings.printMarginColumn=e,this.forEach(function(t){t.setPrintMarginColumn(e)})),localStorage.setItem("codiad.editor.printMarginColumn",e)},setIndentGuides:function(e,t){t?t.setDisplayIndentGuides(e):(this.settings.indentGuides=e,this.forEach(function(t){t.setDisplayIndentGuides(e)})),localStorage.setItem("codiad.editor.indentGuides",e)},setCodeFolding:function(e,t){t?t.setFoldStyle(e):this.forEach(function(t){t.setFoldStyle(e)})},setWrapMode:function(e,t){t?t.getSession().setUseWrapMode(e):this.forEach(function(t){t.getSession().setUseWrapMode(e)}),localStorage.setItem("codiad.editor.wrapMode",e)},setPersistentModal:function(t,e){this.settings.persistentModal=t,localStorage.setItem("codiad.editor.persistentModal",t)},setRightSidebarTrigger:function(t,e){this.settings.rightSidebarTrigger=t,localStorage.setItem("codiad.editor.rightSidebarTrigger",t)},setFileManagerTrigger:function(t,e){this.settings.fileManagerTrigger=t,localStorage.setItem("codiad.editor.fileManagerTrigger",t),i.project.loadSide()},setTabSize:function(e,t){t?t.getSession().setTabSize(parseInt(e)):this.forEach(function(t){t.getSession().setTabSize(parseInt(e))}),localStorage.setItem("codiad.editor.tabSize",e)},setSoftTabs:function(e,t){t?t.getSession().setUseSoftTabs(e):this.forEach(function(t){t.getSession().setUseSoftTabs(e)}),localStorage.setItem("codiad.editor.softTabs",e)},getContent:function(t){if(t=t||this.getActive()){var e=t.getSession().getValue();return e||(e=" "),e}},resize:function(t){(t=t||this.getActive())&&t.resize()},changeListener:function(t){var e=this;t.on("change",function(){i.active.markChanged(e.getActive().getSession().path)})},getSelectedText:function(t){if(t=t||this.getActive())return t.getCopyText()},insertText:function(t,e){(e=e||this.getActive())&&e.insert(t)},gotoLine:function(t,e){(e=e||this.getActive())&&e.gotoLine(t,0,!0)},focus:function(t){t=t||this.getActive(),this.setActive(t),t&&(t.focus(),i.active.focus(t.getSession().path),this.cursorTracking(t))},cursorTracking:function(t){(t=t||this.getActive())&&(clearInterval(i._cursorPoll),i._cursorPoll=setInterval(function(){u("#cursor-position").html(i18n("Ln")+": "+(t.getCursorPosition().row+1)+" &middot; "+i18n("Col")+": "+t.getCursorPosition().column)},100))},bindKeys:function(t){var e=this;t.commands.addCommand({name:"Find",bindKey:{win:"Ctrl-F",mac:"Command-F"},exec:function(t){e.openSearch("find")}}),t.commands.addCommand({name:"Replace",bindKey:{win:"Ctrl-R",mac:"Command-R"},exec:function(t){e.openSearch("replace")}}),t.commands.addCommand({name:"Move Up",bindKey:{win:"Ctrl-up",mac:"Command-up"},exec:function(t){i.active.move("up")}}),t.commands.addCommand({name:"Move Down",bindKey:{win:"Ctrl-down",mac:"Command-up"},exec:function(t){i.active.move("down")}})},openSearch:function(t){this.getActive()?(i.modal.load(400,"components/editor/dialog.php?action=search&type="+t),i.modal.hideOverlay()):i.message.error("No Open Files")},search:function(t,e){if(e=e||this.getActive()){var i=u('#modal input[name="find"]').val(),s=u('#modal input[name="replace"]').val();switch(t){case"find":e.find(i,{backwards:!1,wrap:!0,caseSensitive:!1,wholeWord:!1,regExp:!1});break;case"replace":e.find(i,{backwards:!1,wrap:!0,caseSensitive:!1,wholeWord:!1,regExp:!1}),e.replace(s);break;case"replaceAll":e.find(i,{backwards:!1,wrap:!0,caseSensitive:!1,wholeWord:!1,regExp:!1}),e.replaceAll(s)}}}}}(this,jQuery);