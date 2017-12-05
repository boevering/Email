#########################################################
#               AUTHOR: Bart Oevering                   #
#           EMAIL: bart.oevering@student.hu.nl          #
#                                                       #
#        THIS SCRIPT IS FOR TESTING PURPOSES ONLY!      #
#########################################################
#                                                       #
#      Change text and html variables as needed         #
#                                                       #
#########################################################

import smtplib
import pymysql
import sys
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText
from time import gmtime, strftime

# Variables that can be configured
emailsubject = "Subject"
emailfromname = "From Name"
emailfromemail = "From Email"
emailreturn = "Who shal we do for the reply?"
smtpservertest = "localhost"
smtpserverrelay = "actual mailserver:port"
smtpserverrelay_user = "username"
smtpserverrelay_password = "password"
filetest = "test.txt"
filevictims = "example.txt"
databaseserver = "exampleserver"
databaseuser = "exampleuser"
databaseww = "examplepassword"
databasenm = "exampledatebase"

# Try not to change to much below, this works!
# Do change text and html variables to the email you want to send.

choice = input("Do you want a test (1) or send it to the victims (2)?\n[1/2]? ")
server = input("Do you want the mail to "+smtpservertest+" (1) or "+smtpserverrelay+" (2)?\n[1/2]? ")

# Create message container - the correct MIME type is multipart/alternative.
msg = MIMEMultipart('alternative')
msg['Subject'] = emailsubject
msg['From'] = emailfromname
msg['Reply-To'] = emailreturn

# Create the body of the message (a plain-text and an HTML version).
text = ""
html = """\
        """

# Record the MIME types of both parts - text/plain and text/html.
part1 = MIMEText(text, 'plain')
part2 = MIMEText(html, 'html')

# Attach parts into message container.
# According to RFC 2046, the last part of a multipart message, in this case
# the HTML message, is best and preferred.
msg.attach(part1)
msg.attach(part2)

# Set count to zero en make sure we use the correct files and servers according to the menu
count = 0
smtpserver = ""
bestand = ""

if choice is '1':
    bestand = filetest
if choice is '2':
    bestand = filevictims
if server is '1':
    smtpserver = smtpservertest
if server is '2':
    smtpserver = smtpserverrelay

# Let's open the the students file and make sure all output is written to log.txt
with open(bestand) as students:
    f = open('log.txt', 'a')
    orig_stdout = sys.stdout
    sys.stdout = f
    # Send the message via a SMTP server.
    s = smtplib.SMTP_SSL(smtpserver)
    s.login(smtpserverrelay_user, smtpserverrelay_password)

    for student in students:
        msg['To'] = student.strip()
        try:
            # sendmail function takes 3 arguments: sender's address, recipient's address
            # and message to send - here it is sent a1s one string. Also do count en print output to log.txt
            count += 1
            s.sendmail(emailfromemail, student.strip(), msg.as_string())
            print(strftime("%Y-%m-%d %H:%M:%S", gmtime()), "Successfully sent email to", student.strip())
        except ConnectionRefusedError:
            print(strftime("%Y-%m-%d %H:%M:%S", gmtime()), "Error: unable to send email")
            exit()
    print(strftime("%Y-%m-%d %H:%M:%S", gmtime()), "Successfully sent the phishing email to", count, "students")
    s.quit()
    sys.stdout = orig_stdout
    f.close()
    students.close()

if choice is '2':
    db = pymysql.connect(host=databaseserver,user=databaseuser,passwd=databaseww,db=databasenm)
    try:
        cursor = db.cursor()
        cursor.execute('UPDATE `jos_content` SET hits = hits + %s WHERE `jos_content`.`id` = 4', count)
        db.commit()
        print(strftime("%Y-%m-%d %H:%M:%S", gmtime()), "Database updated to add", count, "emails")
    except ConnectionRefusedError:
        print(strftime("%Y-%m-%d %H:%M:%S", gmtime()), "Update of amount email send fail, please add", count, " manually in table 'jos_content'!")
    db.close()
