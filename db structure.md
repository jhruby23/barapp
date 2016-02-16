# BarApp database structure

## users
- id
- first_name
- last_name
- email
- pin
- status
- rfid_nr
- rfid_hex
- teams.id

## teams
- id
- name

## customers
- id
- name

### users_customers
- id
- users.id
- customers.id


## categories
- id
- name
- type (food, drink, special)

## products
- id
- name
- description
- logo_url
- quantity
- member_price
- guest_price
- enabled
- categories.id

## orders
- id
- users.id
- total_price
- order_datetime
- invoice_nr

## orderlines
- id
- orders.id
- products.id
- quantity
- subtotal_price


## warehouse
- id
- products.id
- type (+/-)
- quantity
- price (for +)
- reason (for -)