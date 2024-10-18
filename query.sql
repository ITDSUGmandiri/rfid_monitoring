SELECT c.librarian_name, a.*, b.* FROM tag_location a 
JOIN tag_rfid b ON a.rfid_id = b.rfid_id
JOIN tag_librarian c ON c.librarian_id = a.librarian_id

WHERE b.rfid_rfid = '323032343039313300000000'