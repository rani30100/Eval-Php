!function(){function e(e){return CKEDITOR.tools.capitalize(e,!0)}function a(e){var a=e.sender.editor,t=a.config.easyimage_toolbar;t.split&&(t=t.split(",")),CKEDITOR.tools.array.forEach(t,(function(t){t=a.ui.items[t],e.data[t.name]=a.getCommand(t.command).state}))}var t=!1,i=["jpeg","png","gif","bmp"];CKEDITOR.plugins.easyimage={_parseSrcSet:function(e){var a,t=[];for(a in e)"default"!==a&&t.push(e[a]+" "+a+"w");return t.join(", ")}},CKEDITOR.plugins.add("easyimage",{requires:"imagebase,balloontoolbar,button,dialog,cloudservices",lang:"ar,az,bg,cs,da,de,de-ch,el,en,en-au,et,fa,fr,gl,hr,hu,it,ku,lv,nb,nl,no,pl,pt,pt-br,ro,ru,sk,sq,sr,sr-latn,sv,tr,tt,uk,zh,zh-cn",icons:"easyimagefull,easyimageside,easyimagealt,easyimagealignleft,easyimagealigncenter,easyimagealignright,easyimageupload",hidpi:!0,onLoad:function(){CKEDITOR.dialog.add("easyimageAlt",this.path+"dialogs/easyimagealt.js")},isSupportedEnvironment:function(){return!CKEDITOR.env.ie||11<=CKEDITOR.env.version},init:function(e){this.isSupportedEnvironment()&&(t||(CKEDITOR.document.appendStyleSheet(this.path+"styles/easyimage.css"),t=!0),e.addContentsCss&&e.addContentsCss(this.path+"styles/easyimage.css"))},afterInit:function(t){if(this.isSupportedEnvironment()){var n;for(var s in function(t,n){var s=(l=t.config).easyimage_class,l={name:"easyimage",allowedContent:{figure:{classes:l.easyimage_sideClass},img:{attributes:"!src,srcset,alt,width,sizes"}},requiredContent:"figure; img[!src]",styleableElements:"figure",supportedTypes:new RegExp("image/("+i.join("|")+")","i"),loaderType:CKEDITOR.plugins.cloudservices.cloudServicesLoader,progressReporterType:CKEDITOR.plugins.imagebase.progressBar,upcasts:{figure:function(e){if((!s||e.hasClass(s))&&1===e.find("img",!0).length)return e}},init:function(){function e(a,t){var i=a.$;if(i.complete&&i.naturalWidth)return t(i.naturalWidth);a.once("load",(function(){if(!i.naturalWidth)return i.src=i.src,e(a,t);t(i.naturalWidth)}))}var i=this.parts.image,n=i&&i.$.complete&&!i.$.naturalWidth;(i&&!i.$.complete||n)&&(n&&(i.$.src=i.$.src),e(i,(function(){t._.easyImageToolbarContext.toolbar.reposition()}))),void 0!==(i=this.element.data("cke-upload-id"))&&(this.setData("uploadId",i),this.element.data("cke-upload-id",!1)),this.on("contextMenu",a),t.config.easyimage_class&&this.addClass(t.config.easyimage_class),this.on("uploadStarted",(function(){var a=this;e(a.parts.image,(function(e){a.parts.image.hasAttribute("width")||(a.editor.fire("lockSnapshot"),a.parts.image.setAttribute("width",e),a.editor.fire("unlockSnapshot"))}))})),this.on("uploadDone",(function(e){e=e.data.loader.responseData.response;var a=CKEDITOR.plugins.easyimage._parseSrcSet(e);this.parts.image.setAttributes({"data-cke-saved-src":e.default,src:e.default,srcset:a,sizes:"100vw"}),this.editor.fire("change")})),this.on("uploadFailed",(function(){alert(this.editor.lang.easyimage.uploadFailed)})),this._loadDefaultStyle()},_loadDefaultStyle:function(){var a,i=!1,s=t.config.easyimage_defaultStyle;for(a in n){var l=t.getCommand("easyimage"+e(a));!i&&l&&l.style&&-1!==CKEDITOR.tools.array.indexOf(l.style.group,"easyimage")&&this.checkStyleActive(l.style)&&(i=!0)}!i&&s&&t.getCommand("easyimage"+e(s))&&this.applyStyle(t.getCommand("easyimage"+e(s)).style)}};s&&(l.requiredContent+="(!"+s+")",l.allowedContent.figure.classes="!"+s+","+l.allowedContent.figure.classes),t.plugins.link&&(l=CKEDITOR.plugins.imagebase.addFeature(t,"link",l)),l=CKEDITOR.plugins.imagebase.addFeature(t,"upload",l),l=CKEDITOR.plugins.imagebase.addFeature(t,"caption",l),CKEDITOR.plugins.imagebase.addImageWidget(t,"easyimage",l)}(t,n=CKEDITOR.tools.object.merge({full:{attributes:{class:"easyimage-full"},label:t.lang.easyimage.commands.fullImage},side:{attributes:{class:"easyimage-side"},label:t.lang.easyimage.commands.sideImage},alignLeft:{attributes:{class:"easyimage-align-left"},label:t.lang.common.alignLeft},alignCenter:{attributes:{class:"easyimage-align-center"},label:t.lang.common.alignCenter},alignRight:{attributes:{class:"easyimage-align-right"},label:t.lang.common.alignRight}},t.config.easyimage_styles)),function(e){var a=new RegExp("<img[^>]*\\ssrc=[\\'\\\"]?data:image/("+i.join("|")+");base64,","i");e.on("paste",(function(t){if(!e.isReadOnly&&a.test(t.data.dataValue)){t=t.data;var i,n,s,l,o=document.implementation.createHTMLDocument(""),r=(o=new CKEDITOR.dom.element(o.body),e.widgets.registered.easyimage),g=0;for(o.data("cke-editable",1),o.appendHtml(t.dataValue),n=o.find("img"),l=0;l<n.count();l++){var m=(i=(s=n.getItem(l)).getAttribute("src"))&&"data:"==i.substring(0,5),d=null===s.data("cke-realelement");m&&d&&!s.isReadOnly(1)&&(1<++g&&((m=e.getSelection().getRanges())[0].enlarge(CKEDITOR.ENLARGE_ELEMENT),m[0].collapse(!1)),i.match(/image\/([a-z]+?);/i),m=r._spawnLoader(e,i,r),(i=r._insertWidget(e,r,i,!1,{uploadId:m.id})).data("cke-upload-id",m.id),i.replace(s))}t.dataValue=o.getHtml()}}))}(t),function(a,t){function i(e){return function(a,t){var i=a.widgets.focused,n=CKEDITOR.TRISTATE_DISABLED;i&&"easyimage"===i.name&&(n=e&&e.call(this,i,a,t)?CKEDITOR.TRISTATE_ON:CKEDITOR.TRISTATE_OFF),this.setState(n)}}function n(e,a,t,n){return t.type="widget",t.widget="easyimage",t.group=t.group||"easyimage",t.element="figure",a=new CKEDITOR.style(t),e.filter.allow(a),(a=new CKEDITOR.styleCommand(a)).contextSensitive=!0,a.refresh=i((function(e,a,t){return this.style.checkActive(t,a)})),e.addCommand(n,a),(a=e.getCommand(n)).enable=function(){},a.refresh(e,e.elementPath()),a}a.addCommand("easyimageAlt",new CKEDITOR.dialogCommand("easyimageAlt",{startDisabled:!0,contextSensitive:!0,refresh:i()})),function(t){function i(e,a){var t=e.match(/^easyimage(.+)$/);if(t){var i=(t[1][0]||"").toLowerCase()+t[1].substr(1);if(t[1]in a)return t[1];if(i in a)return i}return null}for(var s in a.on("afterCommandExec",(function(e){i(e.data.name,t)&&(a.forceNextSelectionCheck(),a.selectionChange(!0))})),a.on("beforeCommandExec",(function(e){i(e.data.name,t)&&e.data.command.style.checkActive(e.editor.elementPath(),a)&&(e.cancel(),a.focus())})),t)n(a,s,t[s],"easyimage"+e(s))}(t)}(t,n),t.ui.addButton("EasyImageAlt",{label:t.lang.easyimage.commands.altText,command:"easyimageAlt",toolbar:"easyimage,3"}),n)t.ui.addButton("EasyImage"+e(s),{label:n[s].label,command:"easyimage"+e(s),toolbar:"easyimage,99",icon:n[s].icon,iconHiDpi:n[s].iconHiDpi});!function(e){var a=e.config.easyimage_toolbar;e.plugins.contextmenu&&(a.split&&(a=a.split(",")),e.addMenuGroup("easyimage"),CKEDITOR.tools.array.forEach(a,(function(a){a=e.ui.items[a],e.addMenuItem(a.name,{label:a.label,command:a.command,group:"easyimage"})})))}(t),n=t.config.easyimage_toolbar,t._.easyImageToolbarContext=t.balloonToolbars.create({buttons:n.join?n.join(","):n,widgets:["easyimage"]}),function(e){e.ui.addButton("EasyImageUpload",{label:e.lang.easyimage.commands.upload,command:"easyimageUpload",toolbar:"insert,1"}),e.addCommand("easyimageUpload",{exec:function(){var a=CKEDITOR.dom.element.createFromHtml('<input type="file" accept="image/*" multiple="multiple">');a.once("change",(function(a){(a=a.data.getTarget()).$.files.length&&e.fire("paste",{method:"paste",dataValue:"",dataTransfer:new CKEDITOR.plugins.clipboard.dataTransfer({files:a.$.files,types:["Files"]})})})),a.$.click()}})}(t)}}}),CKEDITOR.config.easyimage_class="easyimage",CKEDITOR.config.easyimage_styles={},CKEDITOR.config.easyimage_defaultStyle="full",CKEDITOR.config.easyimage_toolbar=["EasyImageFull","EasyImageSide","EasyImageAlt"]}();