const bookRepository = require('../repository/bookRepository');

exports.getAllBooks = async () => {
  return await bookRepository.findAll();
};

exports.createBook = async (data) => {
  if (!data.name) {
    throw new Error("Nama tidak boleh kosong");
  }
  return await bookRepository.create(data);
};
