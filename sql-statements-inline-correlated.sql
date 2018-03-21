--SQL:

--outer joins, inner joins, correlated subqueries, inline views, indexing, working costs/costing,  

--Inline-views/nested select statements:

-- Example 1f57
SELECT b.first_name||' '||last_name AS "Broker name", q."Average share"
FROM brokers b
LEFT OUTER JOIN
(
SELECT broker_id, ROUND(AVG(share_amount), 0) AS "Average share"
FROM trades
GROUP BY broker_id
) q
ON b.broker_id = q.broker_id;

-- Example 2
SELECT MAX("Shares traded")
FROM
(
SELECT share_id, COUNT(share_id) AS "Shares traded"
FROM trades
GROUP BY share_id
);

--Correlated subqueries

-- Example 1
SELECT b.first_name||' '||last_name AS "Broker name", t.share_amount AS "Share amount", to_char(t.transaction_time, 'month') AS "Month"
FROM trades t
INNER JOIN brokers b
ON b.broker_id = t.broker_id
WHERE t.share_amount IN
(
SELECT MIN(t2.share_amount)
FROM trades t2
WHERE to_char(t.transaction_time, 'month') = to_char(t2.transaction_time, 'month')
)
ORDER BY to_char(t.transaction_time, 'mm');

--Example 2

SELECT s.name, b.first_name||' '||last_name AS "Broker name", t.price_total
FROM stock_exchanges s
INNER JOIN trades t
ON t.stock_ex_id = s.stock_ex_id
INNER JOIN brokers b
ON b.BROKER_ID = t.broker_id
WHERE t.price_total IN
(
SELECT MAX(t2.price_total)
FROM trades t2
WHERE t.stock_ex_id = t2.stock_ex_id
);

--Filtering aggregates

--Example 1
SELECT share_id  
FROM trades
HAVING MIN(share_amount) >
(
SELECT MAX(share_amount) 
FROM trades
WHERE share_id = 4
GROUP BY share_id
)
GROUP BY share_id;

--Example 2
SELECT first_name||' '||last_name AS "Broker name"
FROM trades
INNER JOIN brokers
ON brokers.broker_id = trades.broker_id
HAVING AVG(share_amount) =
(
SELECT MAX(AVG(share_amount))
FROM trades
GROUP BY broker_id
)
GROUP BY first_name||' '||last_name
;

--Example 3
SELECT companies.name, ROUND(AVG(shares_prices.price), 0) 
FROM places
INNER JOIN companies
ON places.place_id = companies.place_id
INNER JOIN shares
ON shares.company_id = companies.company_id
INNER JOIN shares_prices
ON shares_prices.share_id = shares.share_id
WHERE lower(places.city) LIKE '%london%'
HAVING AVG(shares_prices.price) > 150
GROUP BY companies.name;