SELECT users.name, COUNT(phone_numbers.id)
    FROM users
JOIN phone_numbers ON phone_numbers.user_id = users.id
    WHERE  users.gender = 2 AND TIMESTAMPDIFF(YEAR, FROM_UNIXTIME(users.birth_date), NOW()) BETWEEN 18 AND 22
GROUP BY phone_numbers.user_id;

-- Добавил бы огранчиение внешнего ключа
-- Ограничения внешнего ключа таблицы `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

