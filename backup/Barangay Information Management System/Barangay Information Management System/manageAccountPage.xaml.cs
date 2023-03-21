using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using System.Data;
using System.Data.SqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;
using MySql.Data.MySqlClient;

namespace Barangay_Information_Management_System
{
    /// <summary>
    /// Interaction logic for manageAccountPage.xaml
    /// </summary>
    public partial class manageAccountPage : Window
    {
        SqlConnection connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");

        String selected;
        String currentAccountUsername;
        String accountUsernameToDelete;

        bool isWindowOpenViewAccount;
        bool isWindowOpenChangePassword;

        public manageAccountPage()
        {
            InitializeComponent();


            MaxHeight = SystemParameters.MaximizedPrimaryScreenHeight;
            MaxWidth = SystemParameters.MaximizedPrimaryScreenWidth;

            //Display data in account grid
            connection.Open();
            string displayAllAccounts = "SELECT * FROM accounts";
            SqlCommand displayAllAccountsCMD = new SqlCommand(displayAllAccounts, connection);
            displayAllAccountsCMD.ExecuteNonQuery();
            SqlDataAdapter displayAllAccountsDA = new SqlDataAdapter(displayAllAccountsCMD);
            DataTable displayAllAccountsDT = new DataTable("accounts");
            displayAllAccountsDA.Fill(displayAllAccountsDT);
            search_dataGrid.ItemsSource = displayAllAccountsDT.DefaultView;
            displayAllAccountsDA.Update(displayAllAccountsDT);
            connection.Close();

            //update the selected account to null
            connection.Open();
            SqlCommand updateSelectedAccountViewIDDefaultCMD = new SqlCommand();
            updateSelectedAccountViewIDDefaultCMD.Connection = connection;
            updateSelectedAccountViewIDDefaultCMD.CommandText = "UPDATE selected_account SET selected_account_value = '' WHERE selected_account_id = 1";
            SqlDataAdapter updateSelectedAccountViewIDDefaultDA = new SqlDataAdapter(updateSelectedAccountViewIDDefaultCMD);
            DataTable updateSelectedAccountViewIDDefaultDT = new DataTable();
            updateSelectedAccountViewIDDefaultDA.Fill(updateSelectedAccountViewIDDefaultDT);
            connection.Close();

            category_combobox.Text = "Username";
        }

        private void number_textbox(object sender, TextCompositionEventArgs e)
        {
            Regex regex = new Regex("[^0-9]+");
            e.Handled = regex.IsMatch(e.Text);
        }

        private void Category_combobox_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            selected = (((sender as ComboBox).SelectedValue) as ComboBoxItem).Content.ToString();

            switch (selected)
            {
                case "Username":
                    search_textbox.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    break;

                case "Full Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    break;

                case "First Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    break;

                case "Middle Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    break;

                case "Last Name":
                    search_textbox.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    break;

                case "Purok":
                    search_textbox.Visibility = Visibility.Visible;
                    search_textbox_number.Visibility = Visibility.Hidden;
                    break;

                case "Phone Number":
                    search_textbox.Visibility = Visibility.Hidden;
                    search_textbox_number.Visibility = Visibility.Visible;
                    break;

                default:
                    break;
            }
        }

        private void Search_btn_Click(object sender, RoutedEventArgs e)
        {
            String category_combobox_value = category_combobox.Text;
            String search_textbox_value = search_textbox.Text;
            String search_textbox_number_value = search_textbox_number.Text;

            switch (category_combobox_value)
            {
                case "Username":
                    connection.Open();
                    string refreshDatagridUsername = "SELECT * FROM accounts WHERE username=@username";
                    SqlCommand refreshDatagridUsernameCMD = new SqlCommand(refreshDatagridUsername, connection);
                    refreshDatagridUsernameCMD.Parameters.AddWithValue("@username", search_textbox_value);
                    refreshDatagridUsernameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridUsernameDA = new SqlDataAdapter(refreshDatagridUsernameCMD);
                    DataTable refreshDatagridUsernameDT = new DataTable("accounts");
                    refreshDatagridUsernameDA.Fill(refreshDatagridUsernameDT);
                    search_dataGrid.ItemsSource = refreshDatagridUsernameDT.DefaultView;
                    refreshDatagridUsernameDA.Update(refreshDatagridUsernameDT);
                    connection.Close();
                    break;

                case "Full Name":
                    connection.Open();
                    string refreshDatagridFullname = "SELECT * FROM accounts WHERE full_name LIKE '%' + @fullName + '%'";
                    SqlCommand refreshDatagridFullnameCMD = new SqlCommand(refreshDatagridFullname, connection);
                    refreshDatagridFullnameCMD.Parameters.AddWithValue("@fullName", search_textbox_value);
                    refreshDatagridFullnameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridFullnameDA = new SqlDataAdapter(refreshDatagridFullnameCMD);
                    DataTable refreshDatagridFullnameDT = new DataTable("accounts");
                    refreshDatagridFullnameDA.Fill(refreshDatagridFullnameDT);
                    search_dataGrid.ItemsSource = refreshDatagridFullnameDT.DefaultView;
                    refreshDatagridFullnameDA.Update(refreshDatagridFullnameDT);
                    connection.Close();
                    break;

                case "First Name":
                    connection.Open();
                    string refreshDatagridFirstname = "SELECT * FROM accounts WHERE first_name LIKE '%' + @firstName + '%'";
                    SqlCommand refreshDatagridFirstnameCMD = new SqlCommand(refreshDatagridFirstname, connection);
                    refreshDatagridFirstnameCMD.Parameters.AddWithValue("@firstName", search_textbox_value);
                    refreshDatagridFirstnameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridFirstnameDA = new SqlDataAdapter(refreshDatagridFirstnameCMD);
                    DataTable refreshDatagridFirstnameDT = new DataTable("accounts");
                    refreshDatagridFirstnameDA.Fill(refreshDatagridFirstnameDT);
                    search_dataGrid.ItemsSource = refreshDatagridFirstnameDT.DefaultView;
                    refreshDatagridFirstnameDA.Update(refreshDatagridFirstnameDT);
                    connection.Close();
                    break;

                case "Middle Name":
                    connection.Open();
                    string refreshDatagridMiddlename = "SELECT * FROM accounts WHERE middle_name LIKE '%' + @middleName + '%'";
                    SqlCommand refreshDatagridMiddleCMD = new SqlCommand(refreshDatagridMiddlename, connection);
                    refreshDatagridMiddleCMD.Parameters.AddWithValue("@middleName", search_textbox_value);
                    refreshDatagridMiddleCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridMiddleDA = new SqlDataAdapter(refreshDatagridMiddleCMD);
                    DataTable refreshDatagridMiddleDT = new DataTable("accounts");
                    refreshDatagridMiddleDA.Fill(refreshDatagridMiddleDT);
                    search_dataGrid.ItemsSource = refreshDatagridMiddleDT.DefaultView;
                    refreshDatagridMiddleDA.Update(refreshDatagridMiddleDT);
                    connection.Close();
                    break;

                case "Last Name":
                    connection.Open();
                    string refreshDatagridLastname = "SELECT * FROM accounts WHERE last_name LIKE '%' + @lastName + '%'";
                    SqlCommand refreshDatagridLastnameCMD = new SqlCommand(refreshDatagridLastname, connection);
                    refreshDatagridLastnameCMD.Parameters.AddWithValue("@lastName", search_textbox_value);
                    refreshDatagridLastnameCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridLastnameDA = new SqlDataAdapter(refreshDatagridLastnameCMD);
                    DataTable refreshDatagridLastnameDT = new DataTable("accounts");
                    refreshDatagridLastnameDA.Fill(refreshDatagridLastnameDT);
                    search_dataGrid.ItemsSource = refreshDatagridLastnameDT.DefaultView;
                    refreshDatagridLastnameDA.Update(refreshDatagridLastnameDT);
                    connection.Close();
                    break;

                case "Purok":
                    connection.Open();
                    string refreshDatagridPurok = "SELECT * FROM accounts WHERE purok = @purok";
                    SqlCommand refreshDatagridPurokCMD = new SqlCommand(refreshDatagridPurok, connection);
                    refreshDatagridPurokCMD.Parameters.AddWithValue("@purok", search_textbox_value);
                    refreshDatagridPurokCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridPurokDA = new SqlDataAdapter(refreshDatagridPurokCMD);
                    DataTable refreshDatagridPurokDT = new DataTable("accounts");
                    refreshDatagridPurokDA.Fill(refreshDatagridPurokDT);
                    search_dataGrid.ItemsSource = refreshDatagridPurokDT.DefaultView;
                    refreshDatagridPurokDA.Update(refreshDatagridPurokDT);
                    connection.Close();
                    break;

                case "Phone Number":
                    connection.Open();
                    string refreshDatagridPhoneNumber = "SELECT * FROM accounts WHERE phone_number=@phoneNumber";
                    SqlCommand refreshDatagridPhoneNumberCMD = new SqlCommand(refreshDatagridPhoneNumber, connection);
                    refreshDatagridPhoneNumberCMD.Parameters.AddWithValue("@phoneNumber", search_textbox_number_value);
                    refreshDatagridPhoneNumberCMD.ExecuteNonQuery();
                    SqlDataAdapter refreshDatagridPhoneNumberDA = new SqlDataAdapter(refreshDatagridPhoneNumberCMD);
                    DataTable refreshDatagridPhoneNumberDT = new DataTable("accounts");
                    refreshDatagridPhoneNumberDA.Fill(refreshDatagridPhoneNumberDT);
                    search_dataGrid.ItemsSource = refreshDatagridPhoneNumberDT.DefaultView;
                    refreshDatagridPhoneNumberDA.Update(refreshDatagridPhoneNumberDT);
                    connection.Close();
                    break;

                default:
                    break;
            }
        }

        private void view_member_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRowView = search_dataGrid.SelectedItem as DataRowView;
            string selectedRow_account_id_view = getSelectedRowView.Row[0].ToString();

            //udpate selected item to view
            connection.Open();
            SqlCommand updateSelectedAccountViewIDCMD = new SqlCommand();
            updateSelectedAccountViewIDCMD.Connection = connection;
            updateSelectedAccountViewIDCMD.CommandText = "UPDATE selected_account SET selected_account_value = @viewID WHERE selected_account_id = 1";
            updateSelectedAccountViewIDCMD.Parameters.AddWithValue("@viewID", selectedRow_account_id_view);
            SqlDataAdapter updateSelectedAccountViewIDDA = new SqlDataAdapter(updateSelectedAccountViewIDCMD);
            DataTable updateSelectedAccountViewIDDT = new DataTable();
            updateSelectedAccountViewIDDA.Fill(updateSelectedAccountViewIDDT);
            connection.Close();

            foreach (Window viewAccountWindow in Application.Current.Windows)
            {
                if (viewAccountWindow is viewAccountPage)
                {
                    isWindowOpenViewAccount = true;
                    viewAccountWindow.Activate();
                }
            }

            if (!isWindowOpenViewAccount)
            {
                viewAccountPage viewAccountWindow = new viewAccountPage();
                viewAccountWindow.Show();
            }

            else if (isWindowOpenViewAccount == true)
            {
                isWindowOpenViewAccount = false;
            }
        }


        private void delete_member_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRowDelete = search_dataGrid.SelectedItem as DataRowView;
            string selectedRow_account_id_delete = getSelectedRowDelete.Row[0].ToString();

            MessageBoxResult resultDelete = MessageBox.Show("Do you want to delete this account?", "Confirmation", MessageBoxButton.OKCancel);

            switch (resultDelete)
            {
                case MessageBoxResult.OK:
                    //getting current account id
                    SqlConnection getCurrentAccount_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    getCurrentAccount_connection.Open();
                    SqlCommand getCurrentAccountCMD = new SqlCommand();
                    getCurrentAccountCMD.Connection = getCurrentAccount_connection;
                    getCurrentAccountCMD.CommandText = "SELECT * FROM currentAccount WHERE id = 1";
                    getCurrentAccountCMD.ExecuteNonQuery();

                    SqlDataReader getCurrentAccountDR = getCurrentAccountCMD.ExecuteReader();
                    while (getCurrentAccountDR.Read())
                    {
                        currentAccountUsername = getCurrentAccountDR.GetValue(1).ToString();
                    }
                    getCurrentAccountDR.Close();
                    getCurrentAccount_connection.Close();

                    //getting account to delete
                    SqlConnection getAccountToDelete_connection = new SqlConnection("Data Source=DESKTOP-8QD54J2;Initial Catalog=barangaySystem;Integrated Security=True");
                    getAccountToDelete_connection.Open();
                    SqlCommand getAccountToDeleteCMD = new SqlCommand();
                    getAccountToDeleteCMD.Connection = getAccountToDelete_connection;
                    getAccountToDeleteCMD.CommandText = "SELECT * FROM accounts WHERE id = @accountID";
                    getAccountToDeleteCMD.Parameters.AddWithValue("@accountID", selectedRow_account_id_delete);
                    getAccountToDeleteCMD.ExecuteNonQuery();

                    SqlDataReader getAccountToDeleteDR = getAccountToDeleteCMD.ExecuteReader();
                    while (getAccountToDeleteDR.Read())
                    {
                        accountUsernameToDelete = getAccountToDeleteDR.GetValue(1).ToString();
                    }
                    getAccountToDeleteDR.Close();
                    getAccountToDelete_connection.Close();

                    if(currentAccountUsername == accountUsernameToDelete)
                    {
                        MessageBox.Show("Active account cannot be deleted");
                    }

                    else
                    {
                        //deleting selected account
                        connection.Open();
                        SqlCommand deleteSelectedAccountCMD = new SqlCommand();
                        deleteSelectedAccountCMD.Connection = connection;
                        deleteSelectedAccountCMD.CommandText = "DELETE FROM accounts WHERE id=@accountIDToDelete";
                        deleteSelectedAccountCMD.Parameters.AddWithValue("@accountIDToDelete", selectedRow_account_id_delete);
                        SqlDataAdapter deleteSelectedAccountDA = new SqlDataAdapter(deleteSelectedAccountCMD);
                        DataTable deleteSelectedAccountDT = new DataTable();
                        deleteSelectedAccountDA.Fill(deleteSelectedAccountDT);
                        connection.Close();

                        MessageBox.Show("Account successfully Deleted!");

                        //Update data in account grid
                        connection.Open();
                        string displayAllAccounts = "SELECT * FROM accounts";
                        SqlCommand displayAllAccountsCMD = new SqlCommand(displayAllAccounts, connection);
                        displayAllAccountsCMD.ExecuteNonQuery();
                        SqlDataAdapter displayAllAccountsDA = new SqlDataAdapter(displayAllAccountsCMD);
                        DataTable displayAllAccountsDT = new DataTable("accounts");
                        displayAllAccountsDA.Fill(displayAllAccountsDT);
                        search_dataGrid.ItemsSource = displayAllAccountsDT.DefaultView;
                        displayAllAccountsDA.Update(displayAllAccountsDT);
                        connection.Close();

                    }
                    break;

                case MessageBoxResult.Cancel:
                    break;
            }

        }

        private void change_password_btn_Click(object sender, RoutedEventArgs e)
        {
            DataRowView getSelectedRowChangePassword = search_dataGrid.SelectedItem as DataRowView;
            string selectedRow_account_id_change_password = getSelectedRowChangePassword.Row[0].ToString();

            //udpate selected item to view
            connection.Open();
            SqlCommand updateSelectedAccountViewIDCMD = new SqlCommand();
            updateSelectedAccountViewIDCMD.Connection = connection;
            updateSelectedAccountViewIDCMD.CommandText = "UPDATE selected_account SET selected_account_value = @viewID WHERE selected_account_id = 1";
            updateSelectedAccountViewIDCMD.Parameters.AddWithValue("@viewID", selectedRow_account_id_change_password);
            SqlDataAdapter updateSelectedAccountViewIDDA = new SqlDataAdapter(updateSelectedAccountViewIDCMD);
            DataTable updateSelectedAccountViewIDDT = new DataTable();
            updateSelectedAccountViewIDDA.Fill(updateSelectedAccountViewIDDT);
            connection.Close();

            foreach (Window changePasswordWindow in Application.Current.Windows)
            {
                if (changePasswordWindow is changePasswordPage)
                {
                    isWindowOpenChangePassword = true;
                    changePasswordWindow.Activate();
                }
            }

            if (!isWindowOpenChangePassword)
            {
                changePasswordPage changePasswordWindow = new changePasswordPage();
                changePasswordWindow.Show();
            }

            else if (isWindowOpenChangePassword == true)
            {
                isWindowOpenChangePassword = false;
            }
        }
    }
}
