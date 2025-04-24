import pandas as pd
from sqlalchemy import create_engine
import pygsheets

pd.set_option('display.max_columns', 500)
pd.set_option('display.max_rows', 500)
pd.set_option('display.width', 1000)

conString = 'mysql+pymysql://test:password@localhost:3306/bhambrisolar'
my_conn = create_engine(conString)

query = "SELECT * FROM bom"

df = pd.read_sql(query, my_conn, index_col='SNo.')
# print(df)

path = 'includes/cred.json'
gc = pygsheets.authorize(service_account_file=path)
sh = gc.open('Copy of Coaching Bhambri')
wk1 = sh[2]
wk1.clear()  # remove previous data if any
wk1.set_dataframe(df, (1, 1), copy_index=True, extend=True)
