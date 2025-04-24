import pandas as pd
from sqlalchemy import create_engine
import pygsheets

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


# conString = "mysql+pymysql://test:password@localhost:3306/bhambrisolar"
conString = "mysql+pymysql://ruchiezn_ruchi:Bhambri_22@116.206.104.214:3306/ruchiezn_bhambrisolar"
mysql = create_engine(conString)
connection = mysql.connect()

data = gsheet2df("Due Payments Sales", 3)

data.to_sql("finances", con=mysql, if_exists="replace", index=False)
