// Fake user data (you can replace this with real authentication)
const fakeUser = {
    email: 'test@example.com',
    password: 'password'
  };
  
  // Get page elements
  const loginPage = document.getElementById('login-page');
  const signupPage = document.getElementById('signup-page');
  const todoPage = document.getElementById('todo-page');
  const signUpLink = document.getElementById('sign-up-link');
  const loginLink = document.getElementById('login-link');
  const loginForm = document.getElementById('login-form');
  const addTodoForm = document.getElementById('add-todo-form');
  const todoList = document.getElementById('todo-list');
  const logoutButton = document.getElementById('logout-button');
  
  // Handle form switching between login and sign-up
  signUpLink.addEventListener('click', function(event) {
    event.preventDefault();
    loginPage.style.display = 'none';
    signupPage.style.display = 'block';
  });
  
  loginLink.addEventListener('click', function(event) {
    event.preventDefault();
    signupPage.style.display = 'none';
    loginPage.style.display = 'block';
  });
  
  // Handle login functionality
  loginForm.addEventListener('submit', function(event) {
    event.preventDefault();
  
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
  
    // Simulate authentication by checking the hardcoded user
    if (email === fakeUser.email && password === fakeUser.password) {
      loginPage.style.display = 'none'; // Hide login form
      todoPage.style.display = 'block'; // Show to-do list page
    } else {
      alert('Invalid email or password');
    }
  });
  
  
  // To-Do List Array to store tasks (each task will have a 'done' property)
  let todos = [];
  
  // Handle adding new to-do items
  addTodoForm.addEventListener('submit', function(event) {
    event.preventDefault();
  
    const newTodo = {
      text: document.getElementById('new-todo').value,
      done: false // Initially, the task is not done
    };
    
    if (newTodo.text) {
      todos.push(newTodo);
      renderTodos();
      document.getElementById('new-todo').value = ''; // Clear input
    }
  });
  
  // Render the to-do list
  function renderTodos() {
    todoList.innerHTML = ''; // Clear the list first
  
    todos.forEach((todo, index) => {
      const li = document.createElement('li');
      li.innerHTML = `
        <input type="checkbox" ${todo.done ? 'checked' : ''} onclick="toggleDone(${index})">
        <span class="${todo.done ? 'done' : ''}">${todo.text}</span>
        <button onclick="deleteTodo(${index})">Delete</button>
        <button onclick="editTodoPrompt(${index})">Edit</button>
      `;
      todoList.appendChild(li);
    });
  }
  
  // Toggle the 'done' status of a task
  function toggleDone(index) {
    todos[index].done = !todos[index].done; // Toggle the done status
    renderTodos(); // Re-render the list
  }
  
  // Handle deleting a to-do item
  function deleteTodo(index) {
    todos.splice(index, 1); // Remove the item
    renderTodos(); // Re-render the list
  }
  
  // Handle editing a to-do item
  function editTodoPrompt(index) {
    const newTodoText = prompt('Edit your task:', todos[index].text);
    if (newTodoText) {
      todos[index].text = newTodoText;
      renderTodos(); // Re-render the list
    }
  }
  
  // Handle logging out
  logoutButton.addEventListener('click', function() {
    todoPage.style.display = 'none'; // Hide to-do list
    loginPage.style.display = 'block'; // Show login form again
  });
  