!function(){var t=this;if(!t.localStorage){if(t.globalStorage){try{t.localStorage=t.globalStorage}catch(t){}return}var a=document.createElement("div"),n="localStorage";if(a.style.display="none",document.getElementsByTagName("head")[0].appendChild(a),a.addBehavior){a.addBehavior("#default#userdata");var e=t.localStorage={length:0,setItem:function(t,e){a.load(n),t=o(t),a.getAttribute(t)||this.length++,a.setAttribute(t,e),a.save(n)},getItem:function(t){return a.load(n),t=o(t),a.getAttribute(t)},removeItem:function(t){a.load(n),t=o(t),a.removeAttribute(t),a.save(n),this.length--,this.length<0&&(this.length=0)},clear:function(){a.load(n);for(var t=0;attr=a.XMLDocument.documentElement.attributes[t++];)a.removeAttribute(attr.name);a.save(n),this.length=0},key:function(t){return a.load(n),a.XMLDocument.documentElement.attributes[t]}},o=function(t){return t.replace(/[^-._0-9A-Za-z\xb7\xc0-\xd6\xd8-\xf6\xf8-\u037d\u37f-\u1fff\u200c-\u200d\u203f\u2040\u2070-\u218f]/g,"-")};a.load(n),e.length=a.XMLDocument.documentElement.attributes.length}}}();