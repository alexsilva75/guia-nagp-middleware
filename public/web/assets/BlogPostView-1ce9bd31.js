import{d as l,u as r,r as c,o as u,c as d,a as t,t as p,b as _}from"./index-8539b84f.js";const i={class:"mt-4 px-4"},v=["innerHTML"],g=l({__name:"BlogPostView",props:{postId:{}},setup(n){const o=n,a=r(),e=c(null);return console.log("Post ID: ",o.postId),u(()=>{e.value=a.results.find(s=>s.id===+o.postId),console.log("Post: ",e.value)}),(s,m)=>(_(),d("div",i,[t("h2",null,p(e.value?e.value.title.rendered:""),1),t("p",{class:"py-2",innerHTML:e.value?e.value.content.rendered:""},null,8,v)]))}});export{g as default};
