   M S B A M L   `   `   `  ����a  ]Barangay Information Management System, Version=1.0.0.0, Culture=neutral, PublicKeyToken=null_4clr-namespace:Barangay_Information_Management_System&Barangay_Information_Management_System  5   	   C    =Barangay_Information_Management_System.inputsPageModification   5   	   \ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35D 9http://schemas.microsoft.com/winfx/2006/xaml/presentation    5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   Flocal4clr-namespace:Barangay_Information_Management_System     5   	     � Title$  inputsPageModification��5   	   $��673.162��6(   $��1242.763��69    � WindowStartupLocation$ CenterScreen=�6J    � WindowState$ 	Maximized=�6o    � 
ResizeMode$ NoResize=�6�   .��5	      �  � RowDefinitions 5
   
   �� 5      $��75 �6   6*   �� 5      .+�5   
   � $��0��6   $��Center=�6   $��75��67   ���#189DEC$��0,0,0,3q�6X   .+�5      �� $��Modify Inputs��6   $��18(�6,   $��Tahoma)�6:   $��
10,0,10,10q�6N   $��Center=�6b   $��Center=�6�   $��Bottom=�6�   $��55��6�   
�������$
��Bold"�6�   5      � 5   
   $��1��6   .+�5      �� $��Input Field��6   $��15(�6+   $	��Top=�69   $
��Left=�6Q   $��	92,63,0,0q�6l   $��30��6   $��96��6�   6�   �� 5      -   5         ��Name$ inputCategoryBox��5   %    � Cursor$
 Hand��6   $��13(�6?   $	��Top=�6M   $��30��6e   $	��230��6q   $
��Left=�6}   $��	92,98,0,0q�6�   4  .System.Windows.Automation.AutomationProperties   Name$ inputCategoryBox��6�   $��7,6,5,3q�6  .@�5      �� $��Garbage Disposal��6   6<   �� 5      $��Homelot Status��6   6:   �� 5      $��House Status��6   68   �� 5      $��
House Type��6   66   �� 5      $��Mother Tounge��6   69   �� 5      $��Purok��6   61   �� 5      $��Religion��6   64   �� 5      $��Sanitary Toilet��6   6;   �� 5      $��Tribe��6   61   �� 5      $��Water Source��6   68   5      �� 5       -   5         ��Name$ value��5       $	��Top=�6%   $��30��6=   $	��230��6I   $
��Left=�6U   $��
336,98,0,0q�6p   $ value��6�   $��7,6,5,3q�6�   �� 5!      $��Value��6   $��15(�6%   $	��Top=�63   $
��Left=�6K   $��
336,63,0,0q�6f   $��30��6z   $��96��6�   �� 5"      -   5        	 ��Name$	 addvalue��5"      $
 Hand��6'   $��	Add Value��65   $	��Top=�6I   $
��Left=�6a   $��30��6|   $��
581,98,0,0q�6�   $��96��6�   $ addvalue��6�   6�   �� 5#      $��62,146,63,41q�6   ���#189DEC$��1q�6A   ._�5$      �� $
��Auto=�6   $��Disabled=�6>   .��5%      &   System.Windows.Controls.DataGrid  -   5        
  Name$
 listDataGrid��5%   �      CanUserResizeColumns .     HeadersVisibility$ Column=�6Z   ���	#FFD8D0D0$��0,0,0,10q�6�      VerticalGridLinesBrush �	#FFD8D0D0   HorizontalGridLinesBrush �	#FFD8D0D0$��15(�6�   $��Tahoma)�6     
IsReadOnly .    CanUserAddRows .  $ listDataGrid��6H     CanUserResizeRows .  $y�Visible=�6�     AutoGenerateColumns .  $
��Left=�6�  ��68   �� *	purokList+   ColumnHeaderStyle 5&      �� 5'       �� 
TargetType=  7System.Windows.Controls.Primitives.DataGridColumnHeader"  6    .�5(      ��  �� Property � �� �� Value �	#FF458DA86;   �� 5)       � ��
 �����6L   �� 5*       � ��$ 
0, 0, 0, 2q�6@   �� 5+       � ��$ 0,0,0,10q�67   6J   �� 5,       � ��$ Tahoma)�6;   6L   �� 5-       � ��$ 10,10,10,10q�68   6N   �� 5.       � ��
 �����6K   5/         	CellStyle 52      �� 53      *  $System.Windows.Controls.DataGridCell"  6    .�54      ��  � ��$ 10,0,0,0q�68   �� 55       � �� 56   "   �� 57   &    �� 
TargetType"  66   .R�58   *   ��  �� Padding# z��61   #��z��6U   #��z��6�   #��z��6�    J� SnapsToDevicePixels . ._�59   .   �� # z 6?   5:   +   5;   '   5=      �� 5>       � �� �	#FFD8D0D06;   �� 5?       � ��$ 0q�6@   �� 5@       � ��
 �   �6;    �� Triggers 5A      P� 5B   "    P� Property �@ 
IsSelected P� Value . . �5C   &   ��  � ��
 �   �6S   5D   #   5F         Columns 5I      4  .System.Windows.Controls.DataGridTemplateColumn  5J      ,  &System.Windows.Controls.DataGridColumn   Header$ Delete��61       MinWidth$  63Q�6A   !   CellTemplate! 5K      �� 5L   "   .R�5M   &   �� $	 family_member_delete_btn��6-   -   5        $
 Hand��5M   O   $ family_member_delete_btn��6]   $��45��6�   $
��Left=�6�   .��5N   *   ]� .+�5O   .   �� $��img/Delete Icon.png��64   $��15��6Q   $��15��6]   5P   +   5Q   '   5R   #   5T      0  *System.Windows.Controls.DataGridTextColumn  5U      $
 List��6-   "   Width5  /System.Windows.Controls.DataGridLengthConverter$" * 6;   1	  +System.Windows.Controls.DataGridBoundColumn# 	  Binding# 6E   �� *name+5W      5X      5Y      5Z      5[      5\      