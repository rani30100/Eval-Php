CKEDITOR.dialog.add("uicolor",(function(e){function t(e){var t;"td"==(e=e.data.getTarget()).getName()&&(t=e.getChild(0).getHtml())&&(l(),o(e),n(t))}function o(e){e&&((b=e).setAttribute("aria-selected",!0),b.addClass("cke_colordialog_selected"))}function l(){b&&(b.removeClass("cke_colordialog_selected"),b.removeAttribute("aria-selected"),b=null)}function n(e){f.getContentElement("picker","selectedColor").setValue(e),e||C.getById(I).removeStyle("background-color")}function a(e){!e.name&&(e=new CKEDITOR.event(e));var t,o=!/mouse/.test(e.name),l=e.data.getTarget();"td"==l.getName()&&(t=l.getChild(0).getHtml())&&(r(e),o?h=l:m=l,o&&l.addClass(function(e){e=e.replace(/^#/,"");for(var t=0,o=[];2>=t;t++)o[t]=parseInt(e.substr(2*t,2),16);return 165<=.2126*o[0]+.7152*o[1]+.0722*o[2]}(t)?"cke_colordialog_focused_light":"cke_colordialog_focused_dark"),i(t))}function r(e){(e=!/mouse/.test(e.name)&&h)&&(e.removeClass("cke_colordialog_focused_light"),e.removeClass("cke_colordialog_focused_dark")),h||m||i(!1)}function i(e){e?(C.getById(k).setStyle("background-color",e),C.getById(_).setHtml(e)):(C.getById(k).removeStyle("background-color"),C.getById(_).setHtml("&nbsp;"))}function c(o){var l=o.data,n=l.getTarget(),a=l.getKeystroke(),r="rtl"==e.lang.dir;switch(a){case 38:(o=n.getParent().getPrevious())&&(o=o.getChild([n.getIndex()])).focus(),l.preventDefault();break;case 40:(o=n.getParent().getNext())&&(o=o.getChild([n.getIndex()]))&&1==o.type&&o.focus(),l.preventDefault();break;case 32:case 13:t(o),l.preventDefault();break;case r?37:39:(o=n.getNext())?1==o.type&&(o.focus(),l.preventDefault(!0)):(o=n.getParent().getNext())&&(o=o.getChild([0]))&&1==o.type&&(o.focus(),l.preventDefault(!0));break;case r?39:37:(o=n.getPrevious())?(o.focus(),l.preventDefault(!0)):(o=n.getParent().getPrevious())&&((o=o.getLast()).focus(),l.preventDefault(!0))}}function s(e){return CKEDITOR.tools.getNextId()+"_"+e}function d(e){var t=null;return p&&e&&(t=p.findOne('td[data-color="'+e+'"]')),t}function u(t,a){var r=t||a;if(e.setUiColor(r),f.getContentElement("picker","configBox").setValue(r),t&&f.getContentElement("picker","predefined").getValue()!==r)f.getContentElement("picker","predefined").setValue(r);else if(a){var i=d(r);i?o(i):l(),f.getContentElement("picker","selectedColor").getValue()!==r&&n(r)}}function g(e){return e.getUiColor()?CKEDITOR.tools.parseCssText("color:"+e.getUiColor(),!0).color:null}var f,p,b,h,m,v=CKEDITOR.dom.element,C=CKEDITOR.document,y=e.lang.uicolor,k=s("hicolor"),_=s("hicolortext"),I=s("selhicolor");return p=function(){function e(e,t){for(var a=e;a<e+3;a++){var r=new v(l.$.insertRow(-1));r.setAttribute("role","row");for(var i=t;i<t+3;i++)for(var c=0;6>c;c++)o(r.$,"#"+n[i]+n[c]+n[a])}}function o(e,o){var l=new v(e.insertCell(-1));l.setAttribute("class","ColorCell cke_colordialog_colorcell"),l.setAttribute("tabIndex",-1),l.setAttribute("role","gridcell"),l.setAttribute("data-color",o),l.on("keydown",c),l.on("click",t),l.on("focus",a),l.on("blur",r),l.setStyle("background-color",o);var n=s("color_table_cell");l.setAttribute("aria-labelledby",n),l.append(CKEDITOR.dom.element.createFromHtml('<span id="'+n+'" class="cke_voice_label">'+o+"</span>",CKEDITOR.document))}var l=CKEDITOR.dom.element.createFromHtml('<table tabIndex="-1" class="cke_colordialog_table" aria-label="'+y.options+'" role="grid" style="border-collapse:separate;" cellspacing="0"><caption class="cke_voice_label">'+y.options+'</caption><tbody role="presentation"></tbody></table>');l.on("mouseover",a),l.on("mouseout",r);var n="00 33 66 99 cc ff".split(" ");e(0,0),e(3,0),e(0,3),e(3,3);var i=new v(l.$.insertRow(-1));i.setAttribute("role","row"),o(i.$,"#000000");for(var d=0;16>d;d++){var u=d.toString(16);o(i.$,"#"+u+u+u+u+u+u)}return o(i.$,"#ffffff"),l}(),CKEDITOR.document.appendStyleSheet(CKEDITOR.getUrl(CKEDITOR.plugins.get("uicolor").path+"dialogs/uicolor.css")),{title:y.title,minWidth:360,minHeight:220,buttons:[CKEDITOR.dialog.okButton],onLoad:function(){f=this},onHide:function(){l(),n(null),h&&(h.removeClass("cke_colordialog_focused_light"),h.removeClass("cke_colordialog_focused_dark"),h=null,i(null))},contents:[{id:"picker",label:y.title,accessKey:"I",elements:[{type:"hbox",padding:0,widths:["70%","10%","30%"],children:[{type:"html",html:"<div></div>",onLoad:function(){CKEDITOR.document.getById(this.domId).append(p)},focus:function(){var t=g(e),l=t?d(t):h||this.getElement().getElementsByTag("td").getItem(0);l&&(l&&l.focus(),t&&(o(l),n(t)))}},{type:"html",html:"&nbsp;"},{type:"vbox",padding:0,widths:["70%","5%","25%"],children:[{type:"html",html:"<span>"+y.highlight+'</span><div id="'+k+'" style="border: 1px solid; height: 74px; width: 74px;"></div><div id="'+_+'">&nbsp;</div><span>'+y.selected+'</span><div id="'+I+'" style="border: 1px solid; height: 20px; width: 74px;"></div>'},{type:"text",label:y.selected,labelStyle:"display:none",id:"selectedColor",style:"width: 76px;margin-top:4px",onChange:function(){try{var e=this.getValue();e&&(C.getById(I).setStyle("background-color",e),u(e))}catch(e){l(),n(null)}}}]}]},{type:"vbox",children:[{type:"hbox",padding:0,children:[{id:"predefined",type:"select",default:"",width:"100%",label:y.predefined,items:[[""],["Light blue","#9ab8f3"],["Sand","#d2b48c"],["Metallic","#949aaa"],["Purple","#c2a3c7"],["Olive","#a2c980"],["Happy green","#9bd446"],["Jezebel Blue","#14b8c4"],["Burn","#ff89a"],["Easy red","#ff6969"],["Pisces 3","#48b4f2"],["Aquarius 5","#487ed4"],["Absinthe","#a8cf76"],["Scrambled Egg","#c7a622"],["Hello monday","#8e8d80"],["Lovely sunshine","#f1e8b1"],["Recycled air","#b3c593"],["Down","#bcbca4"],["Mark Twain","#cfe91d"],["Specks of dust","#d1b596"],["Lollipop","#f6ce23"]],onShow:function(){this.setValue(g(e))},onChange:function(){var e=this.getValue();e&&(u(null,e),this.focus())}}]},{id:"configBox",type:"text",label:y.config,onShow:function(){this.getInputElement().setAttribute("readonly",!0),this.setValue(g(e))},onChange:function(){var e=this.getValue();e&&CKEDITOR.tools.style.parse._findColor(e).length&&this.setValue('config.uiColor = "'+e.toLowerCase()+'"',!0)}}]}]}]}}));