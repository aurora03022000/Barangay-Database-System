   M S B A M L   `   `   `  ����a  ]Barangay Information Management System, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null_4clr-namespace:Barangay_Information_Management_System&Barangay_Information_Management_System  5   	   >    8Barangay_Information_Management_System.manageAccountPage   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   Flocal4clr-namespace:Barangay_Information_Management_System     5   	     � Title$  manageAccountPage��5   	   $��691.917��6#   $��1089.286��64   $��1189.286��6E    � 
ResizeMode$ NoResize=�6Y    � WindowState$ 	Maximized=�6o    � WindowStartupLocation$ CenterScreen=�6�   .��5	      � .+�5
   
   � .+�5      �  � RowDefinitions 5      �� 5      $��78 �6$   62   �� 5      .+�5      � $��0��6   $��Center=�6$   $��75��6?   ���#189DEC$��0,0,0,3q�6`   .+�5      �� $��Search Data��6   $��21(�62   $��Tahoma)�6@   $��
10,0,10,10q�6T   $��Center=�6h   $��Center=�6�   $��Bottom=�6�   $��55��6�   
�������$
��Bold"�6�   5      � 5      $��1��6   $��0,0,0,-1q�6$   .+�5      � .+�5      � .+�5      �� $��Search Category��6$   $��Tahoma)�6>   $��15(�6R   $
��Left=�6`   $��	54,47,0,0q�6{   $	��Top=�6�   �� 5      $��Search��6$   $��Tahoma)�65   $��15(�6I   $
��Left=�6W   $��
306,49,0,0q�6r   $	��Top=�6�   $��26��6�   �� 5      -   5         ��Name$ category_combobox��5   5    � Cursor$
 Hand��6'   $	��Top=�6P   $
��Left=�6h   $��30��6�   $��	54,80,0,0q�6�   $	��230��6�   $��Tahoma)�6�   $��8,8,8,0q�6�   4  .System.Windows.Automation.AutomationProperties   Name$ category_combobox��6�   .@�5   "   �� $��Username��6/   $��Italic$�6B   $��13(�6U   6e   �� 5   "   $��	Full Name��6/   $��Italic$�6C   $��13(�6V   6f   �� 5   "   $��
First Name��6/   $��Italic$�6D   $��13(�6W   6g   �� 5   "   $��Middle Name��6/   $��Italic$�6E   $��13(�6X   6h   �� 5   "   $��	Last Name��6/   $��Italic$�6C   $��13(�6V   6f   �� 5    "   $��Purok��6/   $��Italic$�6?   $��13(�6R   6b   �� 5!   "   $��Phone Number��6/   $��Italic$�6F   $��13(�6Y   6i   5"      �� 5$      -   5         ��Name$ search_textbox��5$   &   $y�Visible=�6>   
�������$	��Top=�6j   $
��Left=�6�   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ search_textbox��6�   $��
306,80,0,0q�6  �� 5%      -   5        $ search_textbox_number��5%   &   $y�Hidden=�6g   
�������$	��Top=�6�   $
��Left=�6�   $��30��6�   $	��230��6�   $��Tahoma)�6�   $��5,6,5,0q�6�   $ search_textbox_number��6  $��
306,80,0,0q�65  �� 5&      -   5        	 ��Name$	 
search_btn��5&   %   $	��Top=�69   $
 Hand��6Q   $
��Left=�6_   $��
541,80,0,0q�6z   $��44��6�   $��30��6�   $ 
search_btn��6�   .��5'   "   ]� .+�5(   &   �� $��img/Search Icon.png��6,   $��20��6I   $��20��6T   6b   5)   #   5*      5+      �� 5,      $
��Auto=�6'   $��Disabled=�6J   $��48,132,48,66q�6v   .��5-      &   System.Windows.Controls.DataGrid  -   5        
  Name$
 search_dataGrid��5-   v      CanUserResizeColumns .     HeadersVisibility$ Column=�6D   ���	#FFD8D0D0$��0,0,0,10q�6�      VerticalGridLinesBrush �	#FFD8D0D0   HorizontalGridLinesBrush �	#FFD8D0D0$��15(�6�   $��Tahoma)�6�      
IsReadOnly .    CanUserAddRows .  $ search_dataGrid��65     CanUserResizeRows .  $y�Visible=�6{     AutoGenerateColumns .  $
��Left=�6�     ColumnHeaderStyle 5.   "   �� 5/   &    �� 
TargetType=  7System.Windows.Controls.Primitives.DataGridColumnHeader"  6,   .�50   *   ��  �� Property � �� �� Value �	#FF458DA86G   �� 51   *    � ��
 �����6X   �� 52   *    � ��$ 
0, 0, 0, 2q�6L   �� 53   *    � ��$ 0,0,0,10q�6C   6V   �� 54   *    � ��$ Tahoma)�6G   6X   �� 55   *    � ��$ 10,10,10,10q�6D   6Z   �� 56   *    � ��
 �����6W   57   '      	CellStyle 5:   "   �� 5;   &   *  $System.Windows.Controls.DataGridCell"  6,   .�5<   *   ��  � ��$ 10,0,0,0q�6D   �� 5=   *    � �� 5>   .   �� 5?   2    �� 
TargetType"  6B   .R�5@   6   ��  �� Padding# z��6=   #��z��6a   #��z��6�   #��z��6�    J� SnapsToDevicePixels . ._�5A   :   �� # z 6K   5B   7   5C   3   5E   +   �� 5F   *    � �� �	#FFD8D0D06G   �� 5G   *    � ��$ 0q�6L   �� 5H   *    � ��
 �   �6G    �� Triggers 5I   *   P� 5J   .    P� Property �@ 
IsSelected P� Value . . �5K   2   ��  � ��
 �   �6_   5L   /   5N   '      Columns 5Q   "   4  .System.Windows.Controls.DataGridTemplateColumn  5R   &   ,  &System.Windows.Controls.DataGridColumn   Header$ Delete��6=       MinWidth$  63Q�6M   !   CellTemplate! 5S   *   �� 5T   .   .R�5U   2   �� $	 family_member_delete_btn��69   -   5        $
 Hand��5U   [   $ family_member_delete_btn��6�   $��45��6�   $
��Left=�6�   .��5V   6   ]� .+�5W   :   �� $��img/Delete Icon.png��6@   $��15��6]   $��15��6i   5X   7   5Y   3   5Z   /   5\   '     5]   &   $
 View��6=   $  60Q�6K   ! 5^   *   �� 5_   .   .R�5`   2   �� $	 family_member_view_btn��69   -   5        $
 Hand��5`   Y   $ family_member_view_btn��6g   $��45��6�   $
��Left=�6�   .��5a   6   ]� .+�5b   :   �� $��img/View Icon.png��6@   $��20��6[   $��20��6g   5c   7   5d   3   5e   /   5g   '     5h   &   $ Change��6=   $  60Q�6M   ! 5i   *   �� 5j   .   .R�5k   2   �� $	 family_member_view_btn��69   -   5        $
 Hand��5k   Y   $ family_member_view_btn��6�   $��45��6�   $
��Left=�6�   .��5l   6   ]� .+�5m   :   �� $"��img/Change Password Icon.png��6@   $��20��6f   $��20��6r   5n   7   5o   3   5p   /   5r   '   0  *System.Windows.Controls.DataGridTextColumn  5s   &   $ Username��69   "   Width5  /System.Windows.Controls.DataGridLengthConverter$" * 6K   1	  +System.Windows.Controls.DataGridBoundColumn# 	  Binding# 6U   �� *
username+  5t   &   $ 	Full Name��69   $	  260Q�6L   # 6[   �� *	full_name+  5u   &   $ Barangay��69   $" * 6K   # 6U   �� *
barangay+  5v   &   $ Purok��69   $" * 6H   # 6R   �� *purok+  5w   &   $ Phone Number��69   $" * 6O   # 6Y   �� *phone_number+5y      5z      5{      5|      5}      5~      5      5�      