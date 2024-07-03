const express = require('express')
const app = express()

app.use(express.urlencoded({ extended: true }))

app.get('/', (req, res) => {
  res.send(`
    <h1>XSS Demo</h1>
    <form action="/submit" method="POST">
      <input type="text" name="userInput" />
      <button type="submit">Submit</button>
    </form>
  `)
})

app.post('/submit', (req, res) => {
  const userInput = req.body.userInput
  res.send(`
    <h1>Submitted Data</h1>
    <p>${userInput}</p>
    <a href="/">Go Back</a>
  `)
})

app.listen(3000, () => {
  console.log('Server is running on http://localhost:3000')
})
