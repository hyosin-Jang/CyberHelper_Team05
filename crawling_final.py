import requests
from bs4 import BeautifulSoup

url = 'http://eureka.ewha.ac.kr/eureka/my/hssg4008q.do?YEAR=2020&TERM_CD=20&GROUP_CD=20&SUBJECT_CD=38426&CLASS_NUM=01'
response = requests.get(url)
source = response.text

soup = BeautifulSoup(source, 'html.parser')

table = soup.find(id="table2")
names = table.findAll(class_="GV_HD_C")
informs = table.findAll(class_="GV_TL_L")

idx = 0
for name in names:
    print(name.get_text().strip(), informs[idx].get_text().strip())
    idx = idx+1
