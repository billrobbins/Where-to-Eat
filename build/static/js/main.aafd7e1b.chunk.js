(this.webpackJsonpeat=this.webpackJsonpeat||[]).push([[0],{24:function(t,e,n){},45:function(t,e,n){"use strict";n.r(e);var a=n(2),s=n.n(a),c=n(13),i=n.n(c),r=(n(23),n(24),n(0)),l=function(){return Object(r.jsx)("header",{children:Object(r.jsx)("h1",{className:"header-title",children:"Where Are We Eating?"})})},o=n(14),u=n(15),d=n(18),j=n(17),h=n(16),b=n.n(h).a.create({baseURL:"https://where-to-eat.mystagingwebsite.com/"}),m=function(t){Object(d.a)(n,t);var e=Object(j.a)(n);function n(){var t;Object(o.a)(this,n);for(var a=arguments.length,s=new Array(a),c=0;c<a;c++)s[c]=arguments[c];return(t=e.call.apply(e,[this].concat(s))).state={styles:[],locations:[],restaurants:[]},t.handleSubmit=function(e){e.preventDefault();var n=e.target.styles.value,a=e.target.locations.value;b.get("wp-json/ijab/v1/restaurants/?location=".concat(a,"&style=").concat(n)).then((function(e){t.setState({restaurants:e.data})})).catch((function(t){console.log("Error fetching and parsing data: ",t)}))},t}return Object(u.a)(n,[{key:"componentDidMount",value:function(){var t=this;b.get("wp-json/ijab/v1/options/").then((function(e){t.setState({styles:e.data.styles,locations:e.data.locations})})).catch((function(t){console.log("Error fetching and parsing data: ",t)}))}},{key:"render",value:function(){var t=this.state.styles.map((function(t){return Object(r.jsx)("option",{value:t.slug,children:t.name},t.term_id)})),e=this.state.locations.map((function(t){return Object(r.jsx)("option",{value:t.slug,children:t.name},t.term_id)})),n=this.state.restaurants.map((function(t){return Object(r.jsx)("p",{className:"selected-restaurant",dangerouslySetInnerHTML:{__html:t.name}},t.id)}));return Object(r.jsxs)("div",{className:"card",children:[Object(r.jsx)("div",{className:"results",children:n}),Object(r.jsxs)("form",{className:"selecting",onSubmit:this.handleSubmit,children:[Object(r.jsx)("div",{className:"selector",children:Object(r.jsxs)("label",{children:["Select a style:",Object(r.jsx)("select",{name:"styles",id:"styles",value:this.state.style,children:t})]})}),Object(r.jsx)("div",{className:"selector",children:Object(r.jsxs)("label",{children:["Select a location:",Object(r.jsx)("select",{name:"locations",id:"locations",value:this.state.location,children:e})]})}),Object(r.jsx)("button",{type:"submit",id:"submit",className:"accent",children:"Load"})]})]})}}]),n}(a.Component);var p=function(){return Object(r.jsxs)("div",{className:"App",children:[Object(r.jsx)(l,{}),Object(r.jsx)(m,{})]})},v=function(t){t&&t instanceof Function&&n.e(3).then(n.bind(null,46)).then((function(e){var n=e.getCLS,a=e.getFID,s=e.getFCP,c=e.getLCP,i=e.getTTFB;n(t),a(t),s(t),c(t),i(t)}))};i.a.render(Object(r.jsx)(s.a.StrictMode,{children:Object(r.jsx)(p,{})}),document.getElementById("root")),v()}},[[45,1,2]]]);
//# sourceMappingURL=main.aafd7e1b.chunk.js.map