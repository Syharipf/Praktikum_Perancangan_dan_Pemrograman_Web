const bookService = require('../service/bookService');

exports.getAllBooks = async (req, res) => {
  try {
    const books = await bookService.getAllBooks();
    res.status(200).json(books);
  } catch (err) {
    res.status(500).json({ message: err.message });
  }
};

exports.createBook = async (req, res) => {
  try {
    await bookService.createBook(req.body);
    res.status(201).json({ message: "Book berhasil ditambahkan" });
  } catch (err) {
    res.status(400).json({ message: err.message });
  }
};
