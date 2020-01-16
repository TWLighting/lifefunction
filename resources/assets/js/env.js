let baseUrl = "";
let routerMode = "history";
if (process.env.NODE_ENV == "development") {
  baseUrl = "http://localhost/lifefunction/public/api";
}

export { baseUrl, routerMode };
