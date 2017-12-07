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
#                                                       #
#    Please make sure input file has this structure:    #
#                                                       #
#               Firstname;Lastname;Infix                #
#                                                       #
#                                                       #
#########################################################

import sys
import unidecode

prefix = 'example.com'

inputfile = 'medewerkers.txt'
outputfile = 'emailadresses.txt'

with open(inputfile) as employes:
    f = open(outputfile, 'w')
    orig_stdout = sys.stdout
    sys.stdout = f

    for employ in employes:
        clean = employ.strip()
        cleanlist = clean.split(";")
        try:
            displaylist = cleanlist[0].lower(), cleanlist[2].lower(), cleanlist[1].lower()
            displaystr = '.'.join(displaylist)
            print(unidecode.unidecode(displaystr.replace(" ", ".") + prefix))
        except IndexError:
            displaylist = cleanlist[0].lower(), cleanlist[1].lower()
            displaystr = '.'.join(displaylist)
            print(unidecode.unidecode(displaystr.replace(" ", ".") + prefix))
        except AttributeError:
            print()
    f.close()
    employes.close()
sys.stdout = orig_stdout
print("Done!")
