import pandas as pd
from sqlalchemy import create_engine
import pygsheets
import mysql.connector

pd.set_option("display.max_columns", 500)
pd.set_option("display.max_rows", 500)
pd.set_option("display.width", 1000)


def gsheet2df(spreadsheet_name, sheet_num):
    # scope = ['https://spreadsheets.google.com/feeds', 'https://www.googleapis.com/auth/drive']
    # credentials_path = 'cred.json'
    #
    # credentials = sac.from_json_keyfile_name(credentials_path, scope)
    # client = gs.authorize(credentials)

    path = "includes/cred.json"
    gc = pygsheets.authorize(service_account_file=path)
    sh = gc.open(spreadsheet_name)
    wks = sh[sheet_num]

    # sheet = client.open(spreadsheet_name).get_worksheet(sheet_num).get_all_records()
    # df = pd.DataFrame.from_dict(sheet)
    #
    # return df

    return wks.get_as_df()


# mydb = mysql.connector.connect(
#     host="116.206.104.214", user="ruchiezn_ruchi", password="Bhambri_22", database="ruchiezn_bhambrisolar"
# )

# conn = mysql.connector.connect(
#     user="ruchiezn_ruchi",
#     password="Bhambri_22",
#     host="116.206.104.214",
#     database="ruchiezn_bhambrisolar",
# )

conn = mysql.connector.connect(
    user="test",
    password="password",
    host="localhost",
    database="bhambrisolar",
)

engine = create_engine(
    "mysql+mysqlconnector://{user}:{pw}@localhost:3306/{db}".format(
        user="test", pw="password", db="bhambrisolar"
    )
)

mycursor = conn.cursor()

# sql = "DELETE FROM projects"
#
# mycursor.execute(sql)

conn.commit()

print(mycursor.rowcount, "record(s) deleted")

# conString = "mysql+pymysql://ruchiezn_ruchi:password@116.206.104.214:3306/bhambrisolar"
# mysql = create_engine(conString)
# connection = mysql.connect()

data = gsheet2df("Coaching Bhambri", 9)
data.index += 1
data.to_sql("projects", con=engine, if_exists="replace", index=False)
