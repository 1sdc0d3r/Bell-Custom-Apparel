// const articleList = await import("./articles.js").then(res => res.default);
// const article = articleList.find(e => e.id == id);
const id = new URLSearchParams(window.location.search).get("id");

const URL = 'https://git.heroku.com/bell-custom-apparel.git';
// const URL = 'http://localhost';
const PORT = 8080;
const article = await fetch(`${URL}:${PORT}/${id}`).then(resp => resp.json()).catch(err => console.log(err));

// if (!article) window.location = "404.html";
// fetch('https://jsonplaceholder.typicode.com/todos/1')
//     .then(response => response.json())
//     .then(json => console.log(json));

document.title = article.title + " | Bell Custom Apparel"
const entryPoint = document.querySelector(".blog-post");

const articleDiv = document.createElement("article");
const title = document.createElement("h1");
const date = document.createElement("span");
const author = document.createElement("span");
author.classList.add("author");
const content = document.createElement("div");
const tags = document.createElement("div");
tags.className = "tags";

const contentArr = article.Content.split('/n')
for (let i = 0; i < contentArr.length; i++) {
    const e = document.createElement("p");
    e.textContent = contentArr[i];
    content.appendChild(e);
}
// console.log(contentArr)

const tagsArr = article.Tags.split(',');
for (let i = 0; i < tagsArr.length; i++) {
    const e = document.createElement("a");
    const tag = tagsArr[i];
    e.textContent = `#${tag}`;
    e.href = `/blog/blog.html?tags='${tag}`;
    tags.appendChild(e);
}


title.textContent = article.Title;
date.textContent = article.Date;
author.textContent = article.Author;

articleDiv.append(author, date, title, content, tags);
entryPoint.appendChild(articleDiv);
