// id, title, author, date, imageUrl, imageAlt, category, tags, snippet, content

const articleList = await import("./articles.js").then(res => res.default);
const id = new URLSearchParams(window.location.search).get("id");
const article = articleList.find(e => e.id == id);

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


const contentArr = article.content.split('/n')
for (let i = 0; i < contentArr.length; i++) {
    const e = document.createElement("p");
    e.textContent = contentArr[i];
    content.appendChild(e);
}

const tagsArr = article.tags.split(',');
for (let i = 0; i < tagsArr.length; i++) {
    const e = document.createElement("a");
    const tag = tagsArr[i];
    e.textContent = `#${tag}`;
    e.href = `/blog/blog.html?tags='${tag}`;
    tags.appendChild(e);
}


title.textContent = article.title;
date.textContent = article.date;
author.textContent = article.author;

articleDiv.append(author, date, title, content, tags);
entryPoint.appendChild(articleDiv);
