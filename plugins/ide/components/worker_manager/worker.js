importScripts("../../lib/diff_match_patch.js"),tasks={diff:function(t){var a=new diff_match_patch;return{success:!0,result:a.patch_toText(a.patch_make(t.original,t.changed))}}},self.addEventListener("message",function(t){var a=t.data,s=tasks[a.taskType](a);self.postMessage(s)},!1);