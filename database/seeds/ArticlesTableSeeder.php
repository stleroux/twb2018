<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('articles')->delete();
        
        \DB::table('articles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Add new user to RM Admin list LIST',
                'description_eng' => '
<p>Do not send e-mail to Darcy Halverson.</p><p>Create an Assyst ticket or if one already <strong>exists</strong>, assign the ticket to Account Management group Group name : Ent\\sccm-rm10</p>
',
                'description_fre' => '<p>French</p><p>line one</p><p>line two</p>',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => '2018-02-14 15:04:40',
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => '2018-02-14 15:04:40',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Adding multiple trustees to multiple documents',
                'description_eng' => '
<p>You can assign the rights you need to your documents by doing the following:</p>
<ul>
<li>In EKME, do a profile search where you are the author Select All (Ctrl-A) the documents and then right click and select Profile</li>
<li>Click on the Security button at the bottom of the page</li>
<li>Select All-Tous in the top left box, then find whoever you need to provide rights to in the second section on the left</li>
<li>Click the &gt;&gt; button to add the people to the list of current trustees</li>
<li>By default, this action will provide the user Full Control over the documents</li>
<li>Review the Trustee list and the associated rights and click on the Next button</li>
<li>After a few moments, you will get a pop up window indicating how many records were successfully updated</li>
<li>If there are any errors, take note of the document numbers. These will have to be dealt with on an individual basis</li>
</ul>
',
                'description_fre' => '<p>French text goes here</p>',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Adding new Sector - Directorate or Branch',
                'description_eng' => '
<p>Region -&gt; MECTS_REGION<br /> Sector -&gt; Mects Sector<br /> Directorate -&gt; MECTS RC DG<br /> Branch -&gt; MECTS RC DIR</p>
<p>Example: Create the Sector, Directorate and Branch Region: National - Nationale</p>
<p>Sector: Human resources and Corporate Services - Ressources humains et Serv integres de gestion<br /> Directorate: Human Resources - Ressources humaines<br /> Branch: Staff Rel/Classif/Compensa</p>
<p>1. Find the region_id value National region in MECTS_REGION -&gt; 0</p>
<p>2. Go to the Mects Sector table and copy an existing entry from the same region -&gt; Cohen Inquiry Secretariat</p>
<p>3. Create a new entry in the Mects Sector table</p>
<ul>
<li>Human resources and Corporate Services</li>
<li>Sector Id: make it up</li>
<li>Region Id: 0 (from step 1)</li>
<li>Rc: 60002 (needs to be unique)</li>
<li>Parent RC : blank</li>
</ul>
<p>4. Create a new entry in the Mects RC DG table --&gt; Human Resources &lt;-- -&gt; Rc: 60021 (needs to be unique) -&gt; Parent RC: 60002</p>
<p>5. Create a new entry in Mects RC DIR table --&gt; Staff Rel/Classif/Compensa &lt;-- -&gt; Rc: 60022 (needs to be unique) -&gt; Parent RC: 60021</p>
<p>6. Start -&gt; DM Server Manager -&gt; Caches tab -&gt; Refresh All</p>
<p>7. Test in EKME to make sure the changes are valid 8. Advise user that changes have been done and to go to the Options menu in EKME and click on Refresh Cache to see the changes</p>
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2017-01-01 00:00:00',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Disabled Items',
                'description_eng' => '
<p>Open the application in question (Word, Excel, etc) from your desktop and then go to the File tab.<br />Then click on Options -&gt; Add-Ins.<br />At the bottom of the page is a dropdown called Manage.<br /> Select Disabled Items from the dropdown and click on the Go button.<br /> Enable all items listed here.<br /> Close the application and try to open your document again.</p>
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => '2018-02-14 15:04:41',
                'created_at' => '2016-11-08 14:01:27',
                'updated_at' => '2018-02-14 15:04:41',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'category_id' => 7,
                'title' => 'Unable to connect to EKME',
                'description_eng' => '
Can you try the following :

-> Click on the Start button
-> Go to All Programs
-> click on Open Text
-> Click on DM Connection Wizard

Server Name : VSONKENEDOCS01

If there is nothing listed in the Server Name box
-> Enter the server name above in the Server Name box
-> Click Next
-> Click Finish

If the server(s) is/are listed in the Previously Connected DM section
-> Select the server for your region
-> Click Next
-> Click Finish
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-08 14:02:03',
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Error code 9007',
                'description_eng' => '
Run connection wizard
---------------------------------------------
Start
All Programs
Open Text
DM Connection Wizard
Click Next
Click Finish


Try a Repair on EKME
---------------------------------------------
Start -> Control Panel -> Programs and Features -> Open Text eDOCS DM
Click on Repair button in toolbar at top of screen
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-09 09:48:07',
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 3,
                'category_id' => 7,
                'title' => 'File recovery to SSC',
                'description_eng' => '
<p>Assign ticket to Shard Services and add the following info to the ticket :</p>
<p>Hi ,</p>
<p>I have requested a file restore from SSC based on the following information :</p>
<p>Department : Department of Fisheries and Oceans<br />Internal ticket number : <br />EKME document number : <br />EKME document version : <br />Restore from date : <br />Location of file :&nbsp;</p>
<p>Note that it may take a few days for the restore to occur.<br />Once the file has been restored, someone from SSC will be contacting you.</p>
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => '2018-02-14 15:04:41',
                'created_at' => '2016-11-09 10:03:31',
                'updated_at' => '2018-02-14 15:04:41',
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Group name change in EKME',
                'description_eng' => '
If a user requests to have some group names and IDs changed in EKME
-> OK to change group ID as long has users are informed they will have to update their default profile

exec [docsadm].[sp_Transfer_Access] \'old_group_system_id\',\'new_group_system_id\';

Make sure to disable the old groups after the scripts are ran
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-09 15:06:54',
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 3,
                'category_id' => 7,
                'title' => 'Missing CCM Enterprise menu',
                'description_eng' => '
<p>Can you check the following?</p>
<p>Step 1 : Verify the version of EKME installed on the machine<br /> - Open EKME<br /> - Go to the Help menu<br /> - Select About eDOCS DM<br /> - Note the version number</p>
<p>If the version is 5.3.1 (EKME2), proceed to Step 2<br />If the version is 10.0.0 (EKME 10), go to Step 3<br />If EKME is not installed on the machine, go to step 5</p>
<p>Step 2 : Uninstalling EKME 5.3.1<br /> - Close ALL applications on the machine<br /> - Go to the Start menu<br /> - Click on Control Panel<br /> - Click on Programs and Features<br /> - Find eDocs ccm client and select it (may not be installed)<br /> - Click Uninstall at the top of the window<br /> - Find OpenText eDOCS RM 5.3.1 Admin Tool and select it (may not be installed)<br /> - Click Uninstall at the top of the window<br /> - Wait for the popup window that indicates the application was removed successfully<br /> - Click OK<br /> - Find OpenText eDOCS DM 5.3.1 Extensions (x64) and select it<br /> - Click Uninstall at the top of the window<br /> - Wait for the popup window that indicates the application was removed successfully<br /> - Click OK<br /> - Go to Step 4</p>
<p>Step 3 : Installing the ccmEnterprise menu in EKME<br /> - Close ALL applications on the machine<br /> - Open the Application Catalog<br /> - Find GCCMS &ndash; SGCGS and click on the Install button on the bottom right of the window<br /> - Wait for a pop up message that indicates the application was installed successfully.<br /> o If you get a message that says the application is already installed, please go to Step 5<br />- Reboot the machine<br /> - Try EKME</p>
<p>Step 4 : Installing EKME 10<br /> - Close ALL applications on the machine<br /> - Open the Application Catalog<br /> - Find EKME10 - MGCE10 and select it<br /> - Click on the Install button on the bottom right<br /> - Wait for the popup window that confirms EKME was installed successfully<br /> - Click OK<br /> - Reboot the machine<br /> If you require the ccmEnterprise menu in EKME, go to step 3</p>
<p>Step 5 : Uninstalling ccm eDOCS Client<br /> - Close ALL applications on the machine<br /> - Go to Start<br /> - Click on Control Panel<br /> - Click on Program and Features<br /> - Find ccmEdocs client<br /> - Click Uninstall at the top of the window<br /> - Wait for the popup window that indicates the application was removed successfully<br /> - Click OK<br /> - Go to Step 3</p>
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-09 15:13:43',
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 3,
                'category_id' => 7,
                'title' => 'Invalid security token',
                'description_eng' => '
Can you try the following to resolve your EKME issue?

-	Close all open applications on the machine
-	Go to the Start menu
-	Click on Control Panel
-	Click on Programs and Features
-	Find OpenText eDOCS RM 5.3.1 Admin Tool and select it (if present)
-	Click on the Uninstall button
-	Find OpenText eDOCS DM 5.3.1 Patch 1 Extensions and select it
-	Click on the Uninstall button
-	Once uninstalled, log off/in to the machine

-	Go to the Application Catalog, and install EKME.
-	Follow the prompts to the completion and try EKME again
-	Let me know if that fixes your issue.

ccm eDocs Client
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-09 15:14:35',
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Missing folders in Explorer',
                'description_eng' => '
2x click on the Computer icon on your Desktop
2x click on the c:\\ drive
Click on one of the folders to select it
Click on the Organize button on the top left of the screen
Click on Folder and search options
In the Navigation pane section, make sure “Automatically expand to current folder” is checked
Click Apply
Click OK
Open Windows Explorer DM Extensions and see if the EKME folders now show up
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-10 10:08:30',
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Missing Save button',
                'description_eng' => '
- Click on the Start menu
- In the Run box, type %Appdata%
- Navigate to \\Roaming\\opentext\\DM\\Settings
- Right click the file SaveUIConfig.xml and select edit. (Should open up in notepad) 
- Change the following values from false to true.
- <SecurityPanelEnabled>True</SecurityPanelEnabled>
- <SecurityPanelVisible>True</SecurityPanelVisible>
- Save and close the file.
',
                'description_fre' => '
- Clicquer sur le bouton Démarrer
- Dans la boite de recherche, tapper %Appdata%
- Naviger à \\Roaming\\Opentext\\DM\\Settings
- Ouvrir le document SaveUiConfig avec le bouton droit de la souris
- Changer les valeurs suivante a “True”
- <SecurityPanelEnabled>True</SecurityPanelEnabled>
- <SecurityPanelVisible>True</SecurityPanelVisible>
- Enregistrer et redémarré EKME
',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => '2018-02-14 15:04:41',
                'created_at' => '2016-11-10 10:09:47',
                'updated_at' => '2018-02-14 15:04:41',
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Missing search options',
                'description_eng' => '
ZRM_USERS will provide user with capabilities to search both EKME and RM
- EKME Search (EKME2_SEARCH_RM)
- RM Search (EKME_RMSEARCH)

Make sure that ZRM_USERS is the primary group in the user\'s profile

If DOCS_USERS, only EKME Search will show up
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-14 11:10:48',
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Modify registry settings - document limits',
                'description_eng' => '
<p>Open Regedit <a href="http:\\localhost:8000\\admin\\articles\\11">as admin</a><br />Go to Computer\\ HKEY_CURRENT_USER\\ Software\\ Hummingbird\\ PowerDocs\\ Core\\ Plugins\\ Fusion\\ Settings\\<br />Change Max Size to desired value</p>
<p>OR</p>
<p>Computer HKEY_CURRENT_USER\\ Software\\ Hummingbird\\ PowerDOCS\\ Core\\ Plugins\\ Fusion\\ Settings\\ QuickSearches<br />Change Max Size to desired value</p>
<p>Search Registry for Max Size Computer\\HKEY_USERS\\S-1-5-21-334392860-1687531001-4089495415-95579\\Software\\Hummingbird\\PowerDOCS\\Core\\Plugins\\Fusion\\Settings\\QuickSearches</p>
',
                'description_fre' => '',
                'views' => 0,
                'deleted_at' => NULL,
                'published_at' => NULL,
                'created_at' => '2016-11-14 11:11:50',
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 2,
                'category_id' => 7,
                'title' => 'Move to disposed',
                'description_eng' => '
Get FileCode values from provided spreadsheet
Copy whole column from Excel
Paste in Notepad++
Make sure you end up with only the file codes (1 per line)
Make sure the cursor is at the beginning on the page (before any text)
Run the "Move to disposed macro"

Remove excess characters at the beginning
Remove the last comma at the end and replace it with a )
To make sure the statement is valid

You should end with something like he below


UPDATE [DOCSADM].[PD_FILE_PART]
SET PD_PT2LOC_LINK = \'1023\' -- Disposed
WHERE PD_PT2LOC_LINK = \'1070\' -- 200 Kent
AND PD_FILEPT_NO IN (
\'AAC-1050-13/E001\',
\'AAC-1050-13/A001\',
\'AAC-1050-13/V001\'
)


Once script is completed, send to Julien to run
',
            'description_fre' => '',
            'views' => 0,
            'deleted_at' => NULL,
            'published_at' => NULL,
            'created_at' => '2016-11-14 11:12:29',
            'updated_at' => NULL,
        ),
        15 => 
        array (
            'id' => 16,
            'user_id' => 2,
            'category_id' => 7,
            'title' => 'No mail client installed',
            'description_eng' => '
No mail client installed error

Regedit
HKEY_LOCAL_MACHINE -> SOFTWARE ->Wow6432Node -> MICROSOFT -> Windows Messaging SubSystem
Add a new string value MAPI = 1
',
            'description_fre' => '',
            'views' => 0,
            'deleted_at' => NULL,
            'published_at' => NULL,
            'created_at' => '2016-11-14 11:13:07',
            'updated_at' => NULL,
        ),
        16 => 
        array (
            'id' => 18,
            'user_id' => 2,
            'category_id' => 3,
            'title' => 'Delete Windows user profile',
            'description_eng' => '
<p>You can do it with the User Profiles dialog in System Properties:</p>
<ul>
<li>Log in as different user (with admin privileges) than you want to delete</li>
<li>Open Properties for Computer</li>
<li>Advanced system settings (on the left side)</li>
<li>Settings for User Profiles (in the middle)</li>
<li>Select the profile you want to delete and click the delete button</li>
</ul>
',
            'description_fre' => '',
            'views' => 0,
            'deleted_at' => NULL,
            'published_at' => NULL,
            'created_at' => '2016-11-15 11:10:09',
            'updated_at' => NULL,
        ),
        17 => 
        array (
            'id' => 19,
            'user_id' => 2,
            'category_id' => 7,
            'title' => 'Excel rotating screen when opening a document from EKME',
            'description_eng' => '
<p>Go to your control panel (start -&gt; control panel)</p>
<p>Click on Intel&reg; Graphics and Media</p>
<p>Click on basic or advanced. Then select options and support.</p>
<p>In the hot key management, uncheck &ldquo;Enable.&rdquo;</p>
',
            'description_fre' => '',
            'views' => 0,
            'deleted_at' => NULL,
            'published_at' => NULL,
            'created_at' => '2017-01-05 13:38:42',
            'updated_at' => NULL,
        ),
        18 => 
        array (
            'id' => 20,
            'user_id' => 2,
            'category_id' => 1,
            'title' => 'User not in license role',
            'description_eng' => '
<p>What you are looking for is "Contact Users"</p>
<p>Go to Configuration menu<br />Expand Organization / Contact User<br />Search for for the Contact User by clicking on yellow folder on the tool bar on the right hand side pane<br />Enter the user ID in the shortcode field<br />Click Ok in the search window<br />Make sure that</p>
<ol style="list-style-type: lower-alpha;">
<li style="padding-left: 30px;">Login = cu_[userID]</li>
<li style="padding-left: 30px;">User Alias = ANET</li>
<li style="padding-left: 30px;">License Role = DFO-MPO USERS</li>
</ol>
<p>If it\'s asking for a password then just add a bogus password in the password field like 123456</p>
',
            'description_fre' => '',
            'views' => 0,
            'deleted_at' => NULL,
            'published_at' => NULL,
            'created_at' => '2017-01-09 14:56:36',
            'updated_at' => NULL,
        ),
    ));
        
        
    }
}