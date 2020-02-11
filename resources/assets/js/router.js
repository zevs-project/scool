import VueRouter from "vue-router";
import shortArticle from "./components/blocks/short-article";
import fullArticle from "./components/blocks/full-article";

export default new VueRouter({
  routes: [
    {
      name: "fullArticle",
      path: "/:category/article/:id",
      component: fullArticle
    },
    {
      "name": "articlesWithPages",
      path: "/:category/page/:page",
      component: shortArticle
    },
    {
      path: "/:category",
      component: shortArticle
    }
    
  ],
  mode: "history"
});
