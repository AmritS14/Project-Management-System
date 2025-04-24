import pandas as pd
from sqlalchemy import create_engine
import pygsheets
import mysql.connector

pd.set_option("display.max_columns", 500)
pd.set_option("display.max_rows", 500)
pd.set_option("display.width", 1000)

conString = "mysql+pymysql://test:password@localhost:3306/bhambrisolar"
my_conn = create_engine(conString)

# conn = mysql.connector.connect(
#     user="test", password="password", host="127.0.0.1", database="bhambrisolar"
# )
#
# mycursor = conn.cursor()
# sql = "CREATE TEMPORARY TABLE TempProjects AS SELECT * FROM projects"
# mycursor.execute(sql)
# sql = "ALTER TABLE TempProjects DROP COLUMN SNO;"
# mycursor.execute(sql)

# query = "SELECT `Dt of order recd`,`INSURANCE`,`NET METERING STATUS`,`OLD /UNDER CONS/DISCOM`,`NAME OF CLIENT`,`pending`,`KW`,`STATUS`,`REMARKS`,`NEXT ACTION`,`Expected No.of days for completion`,`START DATE`,`PLANNED DT COMPLETION`,`Difference`,`SITE VISIT FOR DIMENSION`,`CHK LST AS TATA`,`INSTALLER NAME`,`DESIGN APPROVAL  PLANNED DATE`,`DESIGN APPROVAL ACTUAL DATE`,`STRUCTURE ORDER PLANNED DATE`,`BOM READY PLANNED DATE`,`BOM ACTUAL DATE`,`MATERIAL PURCHASE ACTUAL DT`,`STRUCURE CHK PLANNED DATE ON SITE`,`CIVIL UPVC PIPE PURCHASE`,`STRUCT INSTALL AS PER DESIGN`,`EARTHING WORK`,`PANELS INSTALL`,`DC WIRING EQUIP MOUNT`,`AC WIRING`,`COMMISIONING PLANNED DT`,`COMMISIONING ACTUAL DT` FROM projects pr"
query = "SELECT * FROM projects"
df = pd.read_sql(query, my_conn)
# print(df)

path = "includes/cred.json"
gc = pygsheets.authorize(service_account_file=path)
sh = gc.open("Copy of Coaching Bhambri")
wk1 = sh[1]
wk1.clear()  # remove previous data if any
wk1.set_dataframe(df, (1, 1), copy_index=False, extend=True)
