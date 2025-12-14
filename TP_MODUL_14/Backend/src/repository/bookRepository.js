const db = require('../config/db');

exports.findAll = async () => {
  const [rows] = await db.query(
    "SELECT * FROM books ORDER BY createdAt DESC"
  );
  return rows;
};

exports.create = async (data) => {
  const { name, description, release_date, rating } = data;
  await db.query(
    "INSERT INTO books (name, description, release_date, rating) VALUES (?, ?, ?, ?)",
    [name, description, release_date, rating]
  );
};
